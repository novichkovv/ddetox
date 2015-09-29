<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class FrontpageController extends Controller {

	public function index() {
		Toolbar::title('Welcome to Advanced Polls Frontpage');

		echo $this->_view->output();
	}
}