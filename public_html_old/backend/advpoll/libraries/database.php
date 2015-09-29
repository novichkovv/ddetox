<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class Database {
	protected static $_instance	= array();
	protected $_host;
	protected $_user;
	protected $_pass;
	protected $_db;
	protected $_prefix;

	protected $_connection;
	protected $_sql;
	protected $_cursor;
	protected $_error;

	public function __construct($options = array()) {
		if (!empty($options)) {
			$this->_host	= @$options['host'];
			$this->_user	= @$options['user'];
			$this->_pass	= @$options['pass'];
			$this->_db		= @$options['db'];
			$this->_prefix	= @$options['prefix'];
		} else {
			$this->_host	= DB_HOST;
			$this->_user	= DB_USER;
			$this->_pass	= DB_PASS;
			$this->_db		= DB_NAME;
			$this->_prefix	= DB_PREFIX;
		}

		if (!($this->_connection = @mysql_connect($this->_host, $this->_user, $this->_pass))) {
			$this->_error	= 'Cannot connect to database server.';
		} else if (!mysql_select_db($this->_db, $this->_connection)) {
			$this->_error	= 'Cannot connect to database.';
		}
	}
	
	public static function getInstance($options = array()) {
		$signature	= md5(serialize($options));

		if (empty(self::$_instance[$signature])) {
			self::$_instance[$signature]	= new Database($options);
		}

		return self::$_instance[$signature];
	}

	protected function processQuery($sql) {
		return str_replace('#__', $this->_prefix, $sql);
	}

	public function setQuery($sql) {
		$this->_sql	= $this->processQuery($sql);
	}

	public function getQuery() {
		return $this->_sql;
	}

	public function insertid() {
		return mysql_insert_id($this->_connection);
	}

	public function getAffectedRows() {
		return mysql_affected_rows($this->_connection);
	}

	public function getNumRows() {
		return mysql_num_rows($this->_cursor);
	}

	public function quote($string) {
		return '\'' . mysql_real_escape_string($string) . '\'';
	}

	public function getError() {
		return $this->_error;
	}

	function splitQueries($queries) {
		$start = 0;
		$open = false;
		$open_char = '';
		$end = strlen($queries);
		$query_split = array();
		for ($i = 0; $i < $end; $i++) {
			$current = substr($queries, $i, 1);
			if (($current == '"' || $current == '\'')) {
				$n = 2;
				while (substr($queries, $i - $n + 1, 1) == '\\' && $n < $i) {
					$n++;
				}
				if ($n % 2 == 0) {
					if ($open) {
						if ($current == $open_char) {
							$open = false;
							$open_char = '';
						}
					} else {
						$open = true;
						$open_char = $current;
					}
				}
			}
			if (($current == ';' && !$open) || $i == $end - 1) {
				$query_split[] = substr($queries, $start, ($i - $start + 1));
				$start = $i + 1;
			}
		}

		return $query_split;
	}

	public function multiQuery($queries) {
		if (is_string($queries)) {
			$queries	= $this->splitQueries($queries);
		}

		foreach ($queries as $query) {
			$this->setQuery($query);
			$this->query();
		}
	}

	public function query() {
		if (!is_resource($this->_connection)) {
			return false;
		}

		$this->_cursor	= mysql_query($this->_sql, $this->_connection);

		if (!$this->_cursor) {
			$this->_error	= mysql_error();
		}

		return $this->_cursor;
	}

	function loadResultArray($numinarray = 0) {
		if (!($cur = $this->query())) {
			return null;
		}

		$array = array();

		while ($row = mysql_fetch_row($cur)) {
			$array[] = $row[$numinarray];
		}

		mysql_free_result($cur);

		return $array;
	}

	public function loadResult() {
		if (!($cur = $this->query())) {
			return null;
		}

		$ret	= null;

		if ($row = mysql_fetch_row($cur)) {
			$ret	= $row[0];
		}

		mysql_free_result($cur);

		return $ret;
	}

	public function loadObject() {
		if (!($cur = $this->query())) {
			return null;
		}

		$ret	= null;

		if ($object = mysql_fetch_object($cur)) {
			$ret	= $object;
		}

		mysql_free_result($cur);

		return $ret;
	}

	public function loadObjectList($key = '') {
		if (!($cur = $this->query())) {
			return null;
		}

		$rows	= array();

		while ($row = mysql_fetch_object($cur)) {
			if ($key) {
				$rows[$row->$key] = $row;
			} else {
				$rows[]	= $row;
			}
		}

		mysql_free_result($cur);

		return $rows;
	}
}