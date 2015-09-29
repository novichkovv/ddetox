<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class Model {
	protected $_db;
	protected $_state		= array();
	protected $_table		= '';
	protected $_customData	= array();
	protected $_cache		= array();
	protected $_error		= '';

	public function __construct() {
		$this->_db	= Database::getInstance();

		if ($this->_db->getError()) {
			redirect(getRoute('install/index', false));
		}
	}

	public function getState($property = null, $default = null) {
		if (!empty($this->_state[$property])) {
			return $this->_state[$property];
		} else {
			return $default;
		}
	}

	public function setState($property, $value = null) {
		$this->_state[$property]	= $value;
	}

	public function getItems() {
		$page	= $this->getState('page');

		if ($page <= 0) {
			$page	= 1;
		}

		if (empty($this->_cache['items.' . $page])) {
			$query	= $this->getListQuery();
			$query	.= ' LIMIT ' . ($page - 1) * LIST_LIMIT . ', ' . LIST_LIMIT;

			$this->_db->setQuery($query);

			if (!($items = $this->_db->loadObjectList())) {
				if ($this->_db->getError()) {
					$this->_error	= $this->_db->getError();
					Message::addItem($this->_error, 'error');
					return false;
				}
			}

			$this->_cache['items.' . $page]	= $items;
		}

		return $this->_cache['items.' . $page];
	}

	public function getTotal() {
		if (empty($this->_cache['total'])) {
			$query	= $this->getListQuery();

			$this->_db->setQuery($query);

			if (!$this->_db->query()) {
				$this->_error	= $this->_db->getError();
				Message::addItem($this->_error, 'error');
				return false;
			}

			$this->_cache['total']	= $this->_db->getNumRows();
		}

		return $this->_cache['total'];
	}

	protected function getListQuery() {
		$order		= $this->getState('order', 'id');
		$oroderDir	= $this->getState('orderDir', 'asc');

		$query	= 'SELECT * FROM ' . $this->_table . $this->getListQueryWhere()
				. ' ORDER BY ' . $order . ' ' . $oroderDir
		;

		return $query;
	}

	protected function getListQueryWhere() {
		$search	= $this->getState('search');

		if ($search) {
			$where	= ' WHERE title LIKE ' . $this->_db->quote('%' . $search . '%');
		} else {
			$where	= '';
		}

		return $where;
	}

	public function getItem() {
		$id		= (int) $this->getState('id');
		$state	= (int) $this->getState('state', -1);

		if (empty($this->_cache['item.' . $id . '.' . $state])) {
			$query	= 'SELECT * FROM ' . $this->_table
				. ' WHERE id = ' . $id
			;

			if ($state >= 0) {
				$query .= ' AND state = ' . (int) $state;
			}

			$this->_db->setQuery($query);

			if (!($item = $this->_db->loadObject())) {
				if ($this->_db->getError()) {
					$this->_error	= $this->_db->getError();
					Message::addItem($this->_error, 'error');
					return false;
				}
			}

			if (isset($item->params)) {
				$item->params	= new Param($item->params);
			}

			$this->_cache['item.' . $id . '.' . $state]	= $item;
		}

		return $this->_cache['item.' . $id . '.' . $state];
	}

	public function getDefault() {
		return false;
	}

	public function save($data) {
		if ($data['id'] == 0) {
			$keys	= array();
			$vals	= array();
			$fields	= '';
			$values	= '';

			foreach ($data as $key => $val) {
				if ($key == 'id') {
					continue;
				}

				$keys[]	= '`' . $key . '`';
				$vals[]	= $this->_db->quote($val);
			}

			foreach ($this->_customData as $key => $val) {
				$fields	.= $key . ', ';
				$values	.= $val . ', ';
			}

			$fields	= rtrim($fields, ', ');
			$values	= rtrim($values, ', ');

			$query	= 'INSERT INTO ' . $this->_table . '(' . implode(', ', $keys) . (count($key) && $fields ? ', ' : '') . $fields . ')'
					. ' VALUES(' . implode(', ', $vals) . (count($vals) && $values ? ', ' : '') . $values . ')'
			;
			$this->_db->setQuery($query);

			if (!$this->_db->query()) {
				$this->_error	= $this->_db->getError();
				Message::addItem($this->_error, 'error');
				return false;
			}

			return $this->_db->insertid();
		} else {
			$query	= 'UPDATE ' . $this->_table . ' SET ';

			foreach ($data as $key => $val) {
				if ($key == 'id') {
					continue;
				}

				$query .= '`' . $key . '` = ' . $this->_db->quote($val) . ', ';
			}

			$query	= rtrim($query, ', ');
			$query	.= ' WHERE `id` = ' . (int) $data['id'];

			$this->_db->setQuery($query);

			if (!$this->_db->query()) {
				$this->_error	= $this->_db->getError();
				Message::addItem($this->_error, 'error');
				return false;
			}

			return $data['id'];
		}
	}

	public function publish($id, $published = true) {
		$query	= 'UPDATE ' . $this->_table . ' SET state = ' . (int) $published
				. ' WHERE id = ' . (int) $id
		;
		$this->_db->setQuery($query);

		if (!$this->_db->query()) {
			$this->_error	= $this->_db->getError();
			Message::addItem($this->_error, 'error');
			return false;
		}

		return true;
	}

	public function delete($id) {
		$query	= 'DELETE FROM ' . $this->_table . ' WHERE id = ' . (int) $id;
		$this->_db->setQuery($query);

		if (!$this->_db->query()) {
			$this->_error	= $this->_db->getError();
			Message::addItem($this->_error, 'error');
			return false;
		}

		return true;
	}
}