CREATE TABLE IF NOT EXISTS `sb_themen` (
`thema_id` VARCHAR( 32 ) NOT NULL ,
`titel` VARCHAR( 255 ) NOT NULL ,
`user_id` VARCHAR( 32 ) NOT NULL ,
`mkdate` INT( 20 ) NOT NULL DEFAULT '0',
`beschreibung` TEXT NULL ,
`perm` VARCHAR( 255 ) NOT NULL ,
`visible` TINYINT( 2 ) NOT NULL DEFAULT '0',
PRIMARY KEY ( `thema_id` )
);

CREATE TABLE IF NOT EXISTS `sb_artikel` (
`artikel_id` VARCHAR( 32 ) NOT NULL ,
`thema_id` VARCHAR( 32 ) NOT NULL ,
`user_id` VARCHAR( 32 ) NOT NULL ,
`titel` VARCHAR( 255 ) NOT NULL ,
`beschreibung` TEXT NOT NULL ,
`mkdate` INT( 20 ) NOT NULL ,
`visible` TINYINT( 2 ) NOT NULL DEFAULT '0',
PRIMARY KEY ( `artikel_id` )
);

CREATE TABLE IF NOT EXISTS `sb_visits` (
  `object_id` char(32) NOT NULL default '',
  `user_id` char(32) NOT NULL default '',
  `type` enum('thema','artikel') NOT NULL default 'thema',
  `last_visitdate` int(20) NOT NULL default '0',
  PRIMARY KEY  (`object_id`,`user_id`),
  KEY `user_id` (`user_id`)
);

INSERT IGNORE INTO `config` ( `config_id` , `parent_id` , `field` , `value` , `is_default` , `type` , `range` , `section` , `position` , `mkdate` , `chdate` , `description` , `comment` , `message_template` )
VALUES (
'edfb16e3830a7e9e1a3ad6e1ef2c71dg', '', 'BULLETIN_BOARD_DURATION', '30', '1', 'integer', 'global', 'SchwarzesBrettPlugin', '0', '0', '1100709567', 'Wie lange dürfen Anzeigen auf dem schwarzen Brett erscheinen (in Tagen)', 'Default: 30', ''
);

INSERT IGNORE INTO `config` ( `config_id` , `parent_id` , `field` , `value` , `is_default` , `type` , `range` , `section` , `position` , `mkdate` , `chdate` , `description` , `comment` , `message_template` )
VALUES (
'edfb16e3830a7e9e1a3ad6e1ef2c71de', '', 'BULLETIN_BOARD_ANNOUNCEMENTS', '20', '1', 'integer', 'global', 'SchwarzesBrettPlugin', '0', '0', '1100709567', 'Wieviele Anzeigen sollen in der Übersicht angezeigt werden?', 'Default: 20', ''
);
