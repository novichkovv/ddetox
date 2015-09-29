<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class Param {
	protected $_data;

	public function __construct($data = '') {
		$this->setData($data);
	}

	public function setData($data = '') {
		if (is_array($data)) {
			$this->_data	= (object) $data;
		} else if (is_object($data)) {
			$this->_data	= $data;
		} else {
			$this->_data	= json_decode($data);
		}
	}

	public function toString() {
		return json_encode($this->_data);
	}

	public function get($property, $default = '') {
		if (isset($this->_data->$property)) {
			return $this->_data->$property;
		} else {
			return $default;
		}
	}

	public function set($property, $value = '') {
		$this->_data->$property	= $value;
	}

	public function def($property, $value = '') {
		if (!isset($this->_data->$property)) {
			$this->_data->$property	= $value;
		}

		return $this->_data->$property;
	}
}