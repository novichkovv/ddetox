<?php

if (! function_exists ( 'file_get_contents' )) {
	define ( 'PHP_COMPAT_FILE_GET_CONTENTS_MAX_REDIRECTS', 5 );
	
	function file_get_contents($filename, $incpath = false, $resource_context = null) {
		if (is_resource ( $resource_context ) && function_exists ( 'stream_context_get_options' )) {
			$opts = stream_context_get_options ( $resource_context );
		}
		
		$colon_pos = strpos ( $filename, '://' );
		$wrapper = $colon_pos === false ? 'file' : substr ( $filename, 0, $colon_pos );
		$opts = (empty ( $opts ) || empty ( $opts [$wrapper] )) ? array () : $opts [$wrapper];
		
		switch ($wrapper) {
			case 'http' :
				$max_redirects = (isset ( $opts [$wrapper] ['max_redirects'] ) ? $opts [$proto] ['max_redirects'] : PHP_COMPAT_FILE_GET_CONTENTS_MAX_REDIRECTS);
				for($i = 0; $i < $max_redirects; $i ++) {
					$contents = php_compat_http_get_contents_helper ( $filename, $opts );
					if (is_array ( $contents )) {
						// redirected
						$filename = rtrim ( $contents [1] );
						$contents = '';
						continue;
					}
					return $contents;
				}
				user_error ( 'redirect limit exceeded', E_USER_WARNING );
				return;
			case 'ftp' :
			case 'https' :
			case 'ftps' :
			case 'socket' :
			// tbc               
		}
		
		if (false === $fh = fopen ( $filename, 'rb', $incpath )) {
			user_error ( 'failed to open stream: No such file or directory', E_USER_WARNING );
			return false;
		}
		
		clearstatcache ();
		if ($fsize = @filesize ( $filename )) {
			$data = fread ( $fh, $fsize );
		} else {
			$data = '';
			while ( ! feof ( $fh ) ) {
				$data .= fread ( $fh, 8192 );
			}
		}
		
		fclose ( $fh );
		return $data;
	}
	

	function php_compat_http_get_contents_helper($filename, $opts) {
		$path = parse_url ( $filename );
		if (! isset ( $path ['host'] )) {
			return '';
		}
		$fp = fsockopen ( $path ['host'], 80, $errno, $errstr, 4 );
		if (! $fp) {
			return '';
		}
		if (! isset ( $path ['path'] )) {
			$path ['path'] = '/';
		}
		
		$headers = array ('Host' => $path ['host'], 'Conection' => 'close' );
		
		// enforce some options (proxy isn't supported) 
		$opts_defaults = array ('method' => 'GET', 'header' => null, 'user_agent' => ini_get ( 'user_agent' ), 'content' => null, 'request_fulluri' => false );
		
		foreach ( $opts_defaults as $key => $value ) {
			if (! isset ( $opts [$key] )) {
				$opts [$key] = $value;
			}
		}
		$opts ['path'] = $opts ['request_fulluri'] ? $filename : $path ['path'];
		
		// build request
		$request = $opts ['method'] . ' ' . $opts ['path'] . " HTTP/1.0\r\n";
		
		// build headers
		if (isset ( $opts ['header'] )) {
			$optheaders = explode ( "\r\n", $opts ['header'] );
			for($i = count ( $optheaders ); $i --;) {
				$sep_pos = strpos ( $optheaders [$i], ': ' );
				$headers [substr ( $optheaders [$i], 0, $sep_pos )] = substr ( $optheaders [$i], $sep_pos + 2 );
			}
		}
		foreach ( $headers as $key => $value ) {
			$request .= "$key: $value\r\n";
		}
		$request .= "\r\n" . $opts ['content'];
		
		// make request
		fputs ( $fp, $request );
		$response = '';
		while ( ! feof ( $fp ) ) {
			$response .= fgets ( $fp, 8192 );
		}
		fclose ( $fp );
		$content_pos = strpos ( $response, "\r\n\r\n" );
		
		// recurse for redirects
		if (preg_match ( '/^Location: (.*)$/mi', $response, $matches )) {
			return $matches;
		}
		return ($content_pos != - 1 ? substr ( $response, $content_pos + 4 ) : $response);
	}
	
	function php_compat_ftp_get_contents_helper($filename, $opts) {
	}
}

if (! function_exists ( 'file_put_contents' )) {
	
	if (! defined ( 'FILE_USE_INCLUDE_PATH' )) {
		define ( 'FILE_USE_INCLUDE_PATH', 1 );
	}
	
	if (! defined ( 'LOCK_EX' )) {
		define ( 'LOCK_EX', 2 );
	}
	
	if (! defined ( 'FILE_APPEND' )) {
		define ( 'FILE_APPEND', 8 );
	}
	
	function file_put_contents($filename, $content, $flags = null, $resource_context = null) {
		// If $content is an array, convert it to a string
		if (is_array ( $content )) {
			$content = implode ( '', $content );
		}
		
		// If we don't have a string, throw an error
		if (! is_scalar ( $content )) {
			user_error ( 'file_put_contents() The 2nd parameter should be either a string or an array', E_USER_WARNING );
			return false;
		}
		
		// Get the length of data to write
		$length = strlen ( $content );
		
		// Check what mode we are using
		$mode = ($flags & FILE_APPEND) ? 'a' : 'wb';
		
		// Check if we're using the include path
		$use_inc_path = ($flags & FILE_USE_INCLUDE_PATH) ? true : false;
		
		// Open the file for writing
		if (($fh = @fopen ( $filename, $mode, $use_inc_path )) === false) {
			user_error ( 'file_put_contents() failed to open stream: Permission denied', E_USER_WARNING );
			return false;
		}
		
		// Attempt to get an exclusive lock
		$use_lock = ($flags & LOCK_EX) ? true : false;
		if ($use_lock === true) {
			if (! flock ( $fh, LOCK_EX )) {
				return false;
			}
		}
		
		// Write to the file
		$bytes = 0;
		if (($bytes = @fwrite ( $fh, $content )) === false) {
			$errormsg = sprintf ( 'file_put_contents() Failed to write %d bytes to %s', $length, $filename );
			user_error ( $errormsg, E_USER_WARNING );
			return false;
		}
		
		// Close the handle
		@fclose ( $fh );
		
		// Check all the data was written
		if ($bytes != $length) {
			$errormsg = sprintf ( 'file_put_contents() Only %d of %d bytes written, possibly out of free disk space.', $bytes, $length );
			user_error ( $errormsg, E_USER_WARNING );
			return false;
		}
		
		// Return length
		return $bytes;
	}

}