<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class InstallController extends Controller {

	public function index() {
		Toolbar::title('Installation');
		Toolbar::addItem('Run Install', getRoute('install/run'), '', 'btn-primary');

		// get data
		$db		= getUserStateFromRequest('install.db', 'db');
		$site	= getUserStateFromRequest('install.site', 'site');

		if (!is_array($db)) {
			$db				= array();
			$db['host']		= DB_HOST;
			$db['user']		= DB_USER;
			$db['pass']		= DB_PASS;
			$db['name']		= DB_NAME;
			$db['prefix']	= DB_PREFIX;
			$db['old']		= 0;
		}

		if (!is_array($site)) {
			$site				= array();
			$site['name']		= SITE_NAME;
			$site['username']	= 'admin';
			$site['password']	= 'admin';
		}

		$this->_view->set('db',		$db);
		$this->_view->set('site',	$site);

		$this->_view->output();
	}

	public function run() {
		$db		= getUserStateFromRequest('install.db', 'db');
		$site	= getUserStateFromRequest('install.site', 'site');

		if (!is_array($db)) {
			redirect(getRoute('install/index'));
		}

		// check if db is valid.
		if (!$this->_model->check($db)) {
			redirect(getRoute('install/index'), 'Cannot connect to database.', 'error');
		}

		// install database and write config file
		$this->_model->install($db, $site);

		$this->_model->updateDatabase();

		redirect(getRoute('/'));
	}
}