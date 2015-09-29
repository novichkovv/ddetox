<?php
/**
 * @copyright    Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license        http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class PollsModel extends Model {
	public function __construct() {
		parent::__construct();

		$this->_table = '#__polls';
	}

	public function getItem() {
		$id = (int)$this->getState('id');
		$state = (int)$this->getState('state', -1);

		$query = 'SELECT p.*, SUM(a.votes) as total_votes FROM #__polls AS p'
				. ' LEFT JOIN #__poll_answers AS a ON p.id = a.poll_id AND a.state = 1'
				. ' WHERE p.id = ' . $id;

		if ($state >= 0) {
			$query .= ' AND p.state = ' . (int)$state;
		}

		$query .= ' GROUP BY (p.id)';

		$this->_db->setQuery($query);

		if (!($item = $this->_db->loadObject())) {
			if ($this->_db->getError()) {
				$this->_error = $this->_db->getError();
				Message::addItem($this->_error, 'error');

				return false;
			}
		}

		if (isset($item->params)) {
			$item->params = new Param($item->params);
		}

		// load answers
		if ($item->id) {
			$model = new AnswersModel();
			$model->setState('poll_id', $item->id);
			$model->setState('state', 1);
			$model->setState('order', 'ordering');
			$model->setState('orderDir', 'ASC');
			$model->setState('type_answer', $item->params->get('displayOtherAnswer', 1));

			$item->answers = $model->getItems();
		}

		return $item;
	}

	public function vote($poll_id, $answers) {
		$user_ip = $_SERVER['REMOTE_ADDR'];

		foreach ($answers as $answer) {
			$query = 'UPDATE #__poll_answers'
					. ' SET votes = votes + 1'
					. ' WHERE poll_id = ' . (int)$poll_id
					. ' AND id = ' . (int)$answer;
			$this->_db->setQuery($query);
			$this->_db->query();

			$query = 'UPDATE #__polls'
					. ' SET votes = votes + 1'
					. ' WHERE id = ' . (int)$poll_id;
			$this->_db->setQuery($query);
			$this->_db->query();

			$query = 'INSERT INTO #__logs'
					. ' SET date = now()'
					. ', poll_id = ' . (int)$poll_id
					. ', answer_id = ' . (int)$answer
					. ', ip = ' . $this->_db->quote($user_ip);

			$this->_db->setQuery($query);
			$this->_db->query();
		}
	}

	public function voteOtherAnswer($args_other, $args_log) {
		$user_ip 		= $_SERVER['REMOTE_ADDR'];
		$poll_id 		= $args_other['poll_id'];
		$title 			= $args_other['title'];
		$type_answer 	= $args_other['type_answer'];
		$state 			= $args_other['state'];
		$ordering 		= $args_other['ordering'];
		$votes 			= $args_other['votes'];

		$poll_log_id = $args_log['poll_log_id'];
        $date = $args_log['date'];

		$query = "INSERT INTO #__poll_answers (poll_id, title, type_answer, state, ordering, votes) VALUES(" .
					$poll_id . "," .
					$this->_db->quote($title) . "," .
					$this->_db->quote($type_answer) . "," .
					$state . "," . $ordering . "," .
					$votes
				.")";
		$this->_db->setQuery($query);
		$this->_db->query();

		$query = "INSERT INTO #__logs (poll_id, answer_id, ip, date) VALUES(" .
					$poll_log_id . ", " .
					mysql_insert_id() .", " .
					$this->_db->quote($user_ip) . ", " .
					$this->_db->quote($date)
				.")";
		$this->_db->setQuery($query);
		$this->_db->query();

		$query = "UPDATE #__polls SET votes = votes + 1 WHERE id = $poll_id";
		$this->_db->setQuery($query);
		$this->_db->query();
	}

	public function checkExpiredPoll($id) {
		$query = "SELECT * FROM #__polls AS p WHERE p.id = $id AND now() >= p.start_date AND now() <= p.end_date";
		$this->_db->setQuery($query);
		$row = $this->_db->loadObject();

		if($row) {
			return false;
		} else {
			return true;
		}
	}

	public function customStyle($item, $id) {
		$css = '';
		$header_footer_color = $item->params->get('header_footer_bg', '#FFFFFF');
		$header_footer_text = $item->params->get('header_footer_text', '#111111');
		$body_color = $item->params->get('body_bg', '#EEEEDD');
		$body_text = $item->params->get('body_text', '#4D4D4D');

		if(!empty($header_footer_color)) {
			$css .= "
#$id .wrap-advpoll-title,
#$id .advpolls-buttons {
        background: $header_footer_color;
}";
}

		if(!empty($header_footer_text)) {
			$css .= "
#$id .advpolls-title,
#$id .advpolls-buttons {
        color: $header_footer_text;
}";
}

		if(!empty($body_color)) {
			$css .= "
#$id .advpolls-body {
background-color: $body_color;
}";
}

        if(!empty($body_text)) {
			$css .= "
#$id .advpolls-body {
color: $body_text;
}";
}
        	return $css;
        }

}