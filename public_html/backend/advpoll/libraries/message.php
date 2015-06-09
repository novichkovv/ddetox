<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://www.vnskyline.com). All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

class Message {
	public static function addItem($message, $type) {
		$items	= isset($_SESSION['message']) ? $_SESSION['message'] : array();
		$items	= array_merge($items, array(array('message' => $message, 'type' => $type)));

		$_SESSION['message']	= $items;
	}

	public static function render() {
		if (empty($_SESSION['message'])) {
			return;
		}

		$items	= $_SESSION['message'];
		$html	= array();
		unset($_SESSION['message']);

		foreach ($items as $item) {
			$html[]	= '<div class="alert alert-' . $item['type'] . '">';
			$html[]	= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			$html[]	= '<h4>' . ucwords($item['type']) . '</h4>';
			$html[]	= $item['message'];
			$html[]	= '</div>';
		}

		return implode("\n", $html);
	}
}