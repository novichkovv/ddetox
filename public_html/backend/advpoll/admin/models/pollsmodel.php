<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class PollsModel extends Model {

	public function __construct() {
		parent::__construct();

		$this->_table		= '#__polls';
		$this->_customData	= array(
			'created'	=> 'NOW()',
		);
	}

	public function getDefault() {
		$item	= new stdClass();
		$item->id		= 0;
		$item->title	= '';
		$item->state	= 1;
		$item->schedule = 0;
		$item->start_date = '0000-00-00 00:00:00';
		$item->end_date = '0000-00-00 00:00:00';
		$item->params	= new Param();
		$item->answers	= array();

		return $item;
	}

	public function getItem() {
		$item	= parent::getItem();

		// load answers
		if ($item->id) {
			$model	= new AnswersModel();
			$model->setState('poll_id', $item->id);
			$model->setState('order', 'ordering');
			$model->setState('orderDir', 'ASC');

			$item->answers	= $model->getItems();
		}

		return $item;
	}

	public function delete($id) {
		parent::delete($id);

		$query = 'DELETE FROM #__poll_answers WHERE poll_id = ' . (int) $id;
		$this->_db->setQuery($query);
		$this->_db->query();
	}
}