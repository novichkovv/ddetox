<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

class Menu {
	protected static $_items	= array();

	public static function addItem($title, $link, $active) {
		self::$_items[]	= array(
			'title'		=> $title,
			'link'		=> $link,
			'active'	=> $active,
		);
	}

	public static function render() {
		$html	= array();
		$html[]	= '<ul class="nav">';

		foreach (self::$_items as $item) {
			$html[]	= '<li' . ($item['active'] ? ' class="active"' : '') . '><a href="' . $item['link'] . '">' . $item['title'] . '</a></li>';
		}

		$html[]	= '</ul>';

		return implode("\n", $html);
	}
}