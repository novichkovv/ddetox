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
		$poll_id	= $this->getState('poll_id');

		if ($poll_id) {
			$where	= ' WHERE poll_id = ' . (int) $poll_id;
		} else {
			$where	= '';
		}

		return $where;
	}
}