<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class UsersModel extends Model {
	public function getUser($username, $password) {
		$query	= 'SELECT *'
				. ' FROM #__users'
				. ' WHERE username = ' . $this->_db->quote($username) . ' AND password = ' . $this->_db->quote(md5($password))
		;

		$this->_db->setQuery($query);

		return $this->_db->loadObject();
	}

	public function __construct() {
		parent::__construct();

		$this->_table		= '#__users';
	}

	public function getDefault() {
		$item	= new stdClass();
		$item->id			= 0;
		$item->username		= '';
		$item->password		= '';
		$item->type_user 	= 1;

		return $item;
	}

	protected function getListQueryWhere() {
		$search = $this->getState('search');

		if($search) {
			$where = " WHERE username LIKE '%$search%' ";
		} else {
			$where = '';
		}

		return $where;
	}

	public function checkRoleUser() {
		$id = $_SESSION['authorized'];
		$query = "SELECT type_user FROM #__users WHERE id = $id";
		$this->_db->setQuery($query);
		$role = $this->_db->loadResult();

		if($role == 1) {
			return true;
		} else {
			return false;
		}

	}

}