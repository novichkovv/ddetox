<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class PollsController extends Controller {

	public function index() {
		redirect(getRoute('/'));
	}

	public function view($id) {
		$this->_model->setState('id', (int) $id);
		$this->_model->setState('state', 1);

		if (!($item = $this->_model->getItem())) {
			redirect(getRoute('/'), 'Poll not found!', 'error');
		}

		Toolbar::title($item->title);

		$this->_setView('item');
		$this->_view->set('item', $item);
		$this->_view->set('width', 350);
		$this->_view->set('title', 'Poll');
		$this->_view->set('position', 'center');

		$this->_view->output();
	}

	public function ajaxResult() {
		$id		= @$_POST['id'];

		$this->_model->setState('id', (int) $id);
		$this->_model->setState('state', 1);

		if (!($item = $this->_model->getItem())) {
			redirect(getRoute('/'), 'Poll not found!', 'error');
		}

		$this->_setView('result');
		$this->_view->set('message', '');
		$this->_view->set('item', $item);

		$this->_view->output(false);
	}

	public function ajaxVote() {
		$id			= @$_POST['id'];
		$answers	= @$_POST['answers'];
		$other_answer = @$_POST['other_answer_value'];

		$this->_model->setState('id', (int) $id);
		$this->_model->setState('state', 1);

		if (!($item = $this->_model->getItem())) {
			redirect(getRoute('/'), 'Poll not found!', 'error');
		}

		// check if user already voted
		$cookie	= md5('advpolls.' . $item->id);
		$voted	= isset($_COOKIE[$cookie]) ? $_COOKIE[$cookie] : 0;

		$this->_setView('message');

		if ($voted) {
			$this->_view->set('message', 'You already voted for this poll today!');
			$this->_view->output(false);
			return;
		}

		$maxChoices			= $item->params->get('maxChoices');
		$num_answers 		= empty($answers) ? 0 : count($answers);
		$num_other_answer 	= empty($other_answer) ? 0 : count($other_answer);
		$total_answers_submit = $num_answers + $num_other_answer;

		if($total_answers_submit > 0 && $total_answers_submit <= $maxChoices) {
			if(!empty($other_answer)) {
				$args_other = array(
					'poll_id'		=> $id,
					'title'			=> $other_answer,
					'type_answer'	=> 'other',
					'state'			=> 1,
					'ordering'		=> count($item->answers),
					'votes'			=> 1
				);

				$args_logs = array(
					'poll_log_id'	=> $id,
					'date'			=> date('Y-m-d H:i:s')
				);

				setcookie($cookie, '1', time() + $item->params->get('lag', '86400'));
				$this->_model->voteOtherAnswer($args_other, $args_logs);

				$this->_view->set('message', 'Thank you for your vote!');
			}

			if(!empty($answers)) {
				// check if answer is valid
				$panswers	= array();

				foreach ($item->answers as $answer) {
					if (in_array($answer->id, $answers)) {
						$panswers[]	= $answer->id;

						if ($maxChoices > 0 && count($panswers) >= $maxChoices) {
							break;
						}
					}
				}

				if (!count($panswers)) {
					$this->_view->set('message', 'You must select at least one item to vote!');
					$this->_view->output(false);
					return;
				}

				// vote
				setcookie($cookie, '1', time() + $item->params->get('lag', '86400'));
				$this->_model->vote($id, $panswers);

				$this->_view->set('message', 'Thank you for your vote!');
			}
		}

		if ($item->params->get('showResult', 1)) {
			$this->_setView('result');
			$this->_view->set('message', 'Thank you for your vote!');
			$this->_view->set('item', $this->_model->getItem());
		}

		$this->_view->output(false);
	}
}