<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class InstallModel {
	protected $_db		= null;
	protected $_tables	= array(
		'#__users',

	);

	public function __construct() {
		$this->_db	= Database::getInstance();

		if (!$this->_db->getError()) {
			redirect(getRoute('', false));
		}
	}

	public function check($request) {
		$options			= array();
		$options['host']	= $request['host'];
		$options['user']	= $request['user'];
		$options['pass']	= $request['pass'];
		$options['db']		= $request['name'];

		$db	= Database::getInstance($options);

		return !$db->getError();
	}

	public function install($db, $site) {
		// connect to database
		$options			= array();
		$options['host']	= $db['host'];
		$options['user']	= $db['user'];
		$options['pass']	= $db['pass'];
		$options['db']		= $db['name'];
		$options['prefix']	= $db['prefix'];

		$this->_db			= Database::getInstance($options);

		// get all tables of db
		$query	= 'show tables';
		$this->_db->setQuery($query);
		$tables	= $this->_db->loadResultArray();

		// install db
		$prefix		= $db['prefix'];
		$old		= $db['old'];

		foreach ($this->_tables as $table) {
			// check if table is exists
			$tableName	= str_replace('#__', $prefix, $table);

			if (in_array($tableName, $tables)) {
				$query	= $old ? 'RENAME TABLE ' . $tableName . ' TO ' . str_replace('#__', 'bak_', $table) : 'DROP TABLE ' . $tableName;
				$this->_db->setQuery($query);
				$this->_db->query();
			}
		}

		$queries	= file_get_contents(PATH_ROOT . '/database/db.sql');
		$this->_db->multiQuery($queries);

		// add admin account
		$query	= 'INSERT INTO #__users (username, password)'
				. ' VALUES (' . $this->_db->quote($site['username']) . ', ' . $this->_db->quote(md5($site['password'])) . ')'
		;
		$this->_db->setQuery($query);
		$this->_db->query();

		// write file
		$config	= <<<CONFIG
<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

// Database connection
define('DB_HOST',	'{$db['host']}');
define('DB_USER',	'{$db['user']}');
define('DB_PASS',	'{$db['pass']}');
define('DB_NAME',	'{$db['name']}');
define('DB_PREFIX',	'{$db['prefix']}');

// Site Information
define('SITE_NAME',	'{$site['name']}');
define('LIST_LIMIT', 20);
CONFIG;

		file_put_contents(PATH_ROOT . '/config.php', $config);
	}

	public function updateDatabase() {
		$query = "ALTER TABLE #__polls ADD schedule tinyint(1) NOT NULL DEFAULT 0 AFTER state ";
		$this->_db->setQuery($query);
		$this->_db->query();

		$query = "ALTER TABLE #__polls ADD start_date datetime NOT NULL DEFAULT '0000-00-00 00:00:00' AFTER schedule ";
		$this->_db->setQuery($query);
		$this->_db->query();

		$query = "ALTER TABLE #__polls ADD end_date datetime NOT NULL DEFAULT '0000-00-00 00:00:00' AFTER start_date ";
		$this->_db->setQuery($query);
		$this->_db->query();

		$query = "ALTER TABLE #__poll_answers ADD type_answer ENUM('default', 'other') NOT NULL DEFAULT 'default' AFTER title ";
		$this->_db->setQuery($query);
		$this->_db->query();

		$query = "ALTER TABLE #__users ADD type_user tinyint(1) NOT NULL DEFAULT 1 AFTER password";
		$this->_db->setQuery($query);
		$this->_db->query();

	}
}