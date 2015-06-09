<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class View {
	protected $_file;
	protected $_data	= array();

	public function __construct($file) {
		$this->_file	= $file;
	}

	public function set($key, $value) {
		$this->_data[$key]	= $value;
	}

	public function get($key) {
		return $this->_data[$key];
	}

	public function output($partials = true) {
		if (!file_exists($this->_file)) {
			throw new Exception('View ' . $this->_file . ' doesn\'t exist.');
		}

		extract($this->_data);
		ob_start();

		if ($partials) {
			include PATH_BASE . '/partials/head.php';
			include $this->_file;
			include PATH_BASE . '/partials/foot.php';
		} else {
			include $this->_file;
		}

		$output	= ob_get_contents();
		ob_end_clean();

		echo $output;
	}
}