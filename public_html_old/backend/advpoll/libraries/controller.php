<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class Controllerf {
	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_view;
	protected $_modelBaseName;
	protected $_name;

	protected $_itemName	= '';
	protected $_itemsName	= '';
	protected $_listView	= '';
	protected $_itemView	= '';

	public function __construct($model, $action) {
		$this->_controller		= ucwords(get_class($this));
		$this->_action			= $action;
		$this->_modelBaseName	= $model;

		$this->_setModel($model);
		$this->_setView($action);
	}

	protected function _setModel($modelName) {
		$modelName		.= 'Model';
		$this->_model	= new $modelName();
	}

	protected function _setView($viewName) {
		$this->_view	= new View(PATH_BASE . '/views/' . strtolower($this->_modelBaseName) . '/' . $viewName . '.php');
	}
}