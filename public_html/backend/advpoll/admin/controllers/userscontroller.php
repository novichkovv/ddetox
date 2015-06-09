<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class UsersController extends ControllerAdmin {

	public function __construct($model, $action) {
		parent::__construct($model, $action);
		$this->_itemName = 'User';
		$this->_itemsName = 'Users';

		$this->_model->setState('orderDir', 'DESC');
	}

	public function login() {
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$username	= $_POST['username'];
			$password	= $_POST['password'];

			$user		= $this->_model->getUser($username, $password);

			if ($user) {
				$_SESSION['authorized']	= $user->id;
				$this->_model->setState('user_id', $user->id);
				$_SESSION['username'] = $user->username;
				redirect(getRoute('/'));
			}
		}

		$this->_view->output(false);
	}

	public function logout() {
		$_SESSION['authorized'] = 0;

		redirect(getRoute('/'));
	}

	protected function _validate() {
		$id				= @$_POST['id'];
		$username 		= @$_POST['username'];
		$password 		= @$_POST['password'];
		$type_user 		= @$_POST['type_user'];

		if($id) {
			if(empty($password)) {
				$data = array(
					'id'		=> $id,
					'username'	=> $username,
					'type_user'	=> $type_user
				);
			} else {
				$data = array(
					'id'		=> $id,
					'username'	=> $username,
					'password'	=> md5($password),
					'type_user'	=> $type_user
				);
			}
		} else {
			$data = array(
				'id'		=> $id,
				'username'	=> $username,
				'password'	=> md5($password),
				'type_user'	=> $type_user
			);
		}

		return $data;
	}

}