<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class PollsController extends ControllerAdmin {

	public function __construct($model, $action) {
		parent::__construct($model, $action);

		$this->_itemName	= 'Poll';
		$this->_itemsName	= 'Polls';

		$this->_model->setState('orderDir', 'DESC');
	}

	protected function _validate() {
		$id			= @$_POST['id'];
		$title		= @$_POST['title'];
		$state		= @$_POST['state'];
		$schedule	= @$_POST['schedule'];
		$start_date	= @$_POST['start_date'];
		$end_date	= @$_POST['end_date'];

		$params	= new Param(@$_POST['params']);

		if ($title == '') {
			redirect(getRoute($this->_name . '/index'), 'Poll question is required!', 'error');
		}

		if ($params->get('maxChoices') <= 0) {
			$params->set('maxChoices', 1);
		}

		$data	= array(
			'id'			=> $id,
			'title'			=> $title,
			'state'			=> $state,
			'schedule'		=> $schedule,
			'start_date' 	=> $start_date,
			'end_date'		=> $end_date,
			'params'		=> $params->toString(),
		);

		return $data;
	}

	protected function postSaveHook($id, $data) {
		$answersData	= @$_POST['answers'];

		$model			= new AnswersModel();
		$model->setState('poll_id', $id);

		$answers		= $model->getItems();

		foreach ($answers as $item) {
			if (!in_array($item->id, $answersData['id'])) {
				$model->delete($item->id);
			}
		}

		//
		$addedAnswers	= array();

		if (isset($answersData['title'])) {
			for ($i = 0, $n = count($answersData['title']); $i < $n; $i++) {
				if ($answersData['title'][$i] && !in_array($answersData['title'][$i], $addedAnswers)) {
					$addedAnswers[]	= $answersData['title'][$i];

					$pollAnswers	= array(
						'poll_id'	=> $id,
						'ordering'	=> $i,
					);

					foreach ($answersData as $key => $value) {
						if ($key == 'votes') {
							$value[$i]	= (int) $value[$i];
						}

						$pollAnswers[$key]	= $value[$i];
					}

					$model->save($pollAnswers);
				}
			}
		}
	}
}