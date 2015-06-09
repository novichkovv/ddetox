<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class AnswersModel extends Model {

	public function __construct() {
		parent::__construct();

		$this->_table		= '#__poll_answers';
	}

	protected function getListQueryWhere() {
		$poll_id	 = $this->getState('poll_id');
		$state		 = $this->getState('state', -1);
		$type_answer = $this->getState('type_answer');

		$where	= array();

		if ($poll_id) {
			$where[]	= 'poll_id = ' . (int) $poll_id;
		}

		if ($state) {
			$where[]	= 'state = ' . (int) $state;
		}

		if($type_answer == 0) {
			$where[]	= "type_answer = 'default' ";
		}

		$where	= ' WHERE ' . implode(' AND ', $where);

		return $where;
	}

}