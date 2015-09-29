/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

// Avoid `console` errors in browsers that lack a console.
(function () {
	var noop = function noop() {

	};

	var methods = [
		'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		'timeStamp', 'trace', 'warn'
	];
	var length = methods.length;
	var console = window.console || {};

	while (length--) {
		// Only stub undefined methods.
		console[methods[length]] = console[methods[length]] || noop;
	}
}());

// Place any jQuery/helper plugins in here.