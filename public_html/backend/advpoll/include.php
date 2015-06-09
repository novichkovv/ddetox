<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

@define('PATH_ROOT', dirname(__FILE__));
@define('PATH_BASE', dirname(__FILE__));

require_once PATH_ROOT . '/config.php';
require_once PATH_ROOT . '/libraries/func.php';

@define('LIVE_SITE', livesite());
@define('BASE_SITE', livesite());


function getPoll($id, $title = '', $width = 350, $position = 'center') {
	$model	= new PollsModel();
	$view	= new View(PATH_ROOT . '/views/polls/item.php');

	$model->setState('id', (int) $id);
	$model->setState('state', 1);

	if (!($item = $model->getItem())) {
		return;
	}

	$view->set('item', $item);
	$view->set('expired_poll', $model->checkExpiredPoll($item->id));
	$view->set('custom_style', $model->customStyle($item, 'advpoll-' . $item->id));
	$view->set('title', $title);
	$view->set('width', $width);
	$view->set('position', $position);

	$view->output(false);
}