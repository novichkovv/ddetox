CREATE TABLE IF NOT EXISTS `#__users` (
	id int(10) unsigned NOT NULL AUTO_INCREMENT,
	username varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	password varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__polls` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`title` varchar(250) NOT NULL DEFAULT '',
	`state` tinyint(1) NOT NULL DEFAULT '0',
	`created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`votes` int(10) unsigned NOT NULL DEFAULT '0',
	`params` text NOT NULL,
	PRIMARY KEY (`id`),
	KEY `idx_state` (`state`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__poll_answers` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`poll_id` int(10) NOT NULL DEFAULT '0',
	`title` varchar(250) NOT NULL DEFAULT '',
	`state` tinyint(1) NOT NULL DEFAULT '0',
	`ordering` int(10) NOT NULL DEFAULT '0',
	`votes` int(10) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`),
	KEY `idx_state` (`state`),
	KEY `idx_poll_id` (`poll_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__logs` (
	`poll_id` int(11) NOT NULL,
	`answer_id` int(11) NOT NULL,
	`ip` varchar(250) NOT NULL DEFAULT '',
	`date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
