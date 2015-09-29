<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class Toolbar {
	protected static $_items	= array();
	protected static $_title;

	public static function title($title) {
		self::$_title	= $title;
	}

	public static function getTitle() {
		return self::$_title;
	}

	public static function addItem($title, $task = '', $link = '', $class = '') {
		self::$_items[]	= array(
			'title'		=> $title,
			'task'		=> $task ? 'submitForm(\'' . $task . '\');' : '',
			'link'		=> $link ? $link : 'javascript:void(0);',
			'class'		=> $class,
		);
	}

	public static function render() {
		$html	= array();
		$html[]	= '';
		

		return implode("\n", $html);
	}
}