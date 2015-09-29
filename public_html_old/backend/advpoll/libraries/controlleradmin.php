<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class ControllerAdmin extends Controller {
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
		parent::__construct($model, $action);

		$this->_name	= rtrim(strtolower(get_class($this)), 'controller');

		if (!$this->_listView) {
			$this->_listView	= 'list';
		}

		if (!$this->_itemView) {
			$this->_itemView	= 'item';
		}

		$this->_setModel($model);
		$this->_setView($action);
	}

	public function index($page) {
		Toolbar::title($this->_itemsName);
		Toolbar::addItem('<i class="icon-edit"></i> Add New ' . $this->_itemName, '', getRoute($this->_name . '/edit'), 'btn-primary');

		$search	= getUserStateFromRequest($this->_name . '.search', 'search');
		$page	= $page <= 0 ? 1 : $page;

		$this->_model->setState('page', $page);
		$this->_model->setState('search', $search);
		$items	= $this->_model->getItems();
		$total	= $this->_model->getTotal();

		$this->_setView($this->_listView);
		$this->_view->set('search', $search);
		$this->_view->set('page', $page);
		$this->_view->set('total', $total);
		$this->_view->set('items', $items);

		$this->_view->output();
	}

	public function edit($id) {
		$id	= (int) $id;

		if ($id) {
			Toolbar::title('Edit ' . $this->_itemName);
			$this->_model->setState('id', $id);
			$item = $this->_model->getItem();

			if (!$item) {
				redirect(getRoute($this->_name . '/index'), $this->_itemName . ' doesn\'t exist.', 'error');
			}
		} else {
			Toolbar::title('Add New ' . $this->_itemName);
			$item	= $this->_model->getDefault();
		}

		Toolbar::addItem('<i class="icon-ok"></i> Apply', getRoute($this->_name . '/apply'), '', 'btn-success');
		Toolbar::addItem('<i class="icon-save"></i> Save & Close', getRoute($this->_name . '/save'), '', 'btn-info');
		Toolbar::addItem('<i class="icon-remove-sign"></i> Cancel', '', getRoute($this->_name . '/index'), 'btn-danger');

		$this->_setView($this->_itemView);
		$this->_view->set('item', $item);

		$this->_view->output();
	}

	protected function _validate() {
		return false;
	}

	protected function postSaveHook($id, $data) {

	}

	protected function _save() {
		if (!$data = $this->_validate()) {
			redirect(getRoute($this->_name . '/index'), 'Data is invalid', 'error');
		}

		$id = $this->_model->save($data);

		if (!$id) {
			redirect(getRoute($this->_name . '/index'));
		}

		$this->postSaveHook($id, $data);

		return $id;
	}

	public function apply() {
		$id	= $this->_save();

		redirect(getRoute($this->_name . '/edit/' . $id), $this->_itemName . ' has been saved successfully!');
	}

	public function save() {
		$this->_save();

		redirect(getRoute($this->_name . '/index'), $this->_itemName . ' has been saved successfully!');
	}

	public function delete($id) {
		if (!$this->_model->delete($id)) {
			redirect(getRoute($this->_name . '/index'));
		}

		redirect(getRoute($this->_name . '/index'), $this->_itemName . ' has been deleted successfully!');
	}

	public function _publish($id, $published = true) {
		if (!$this->_model->publish($id, $published)) {
			redirect(getRoute($this->_name . '/index'));
		}
	}

	public function publish($id) {
		$this->_publish($id);

		redirect(getRoute($this->_name . '/index'), $this->_itemName . ' has been published successfully!');
	}

	public function unpublish($id) {
		$this->_publish($id, false);

		redirect(getRoute($this->_name . '/index'), $this->_itemName . ' has been unpublished successfully!');
	}
}