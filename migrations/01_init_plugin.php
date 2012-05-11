<?
class InitPlugin extends DBMigration
{
    function description ()
    {
        return 'first things first';
    }

    function up ()
    {
        $db = DBManager::get();
        $exists = $db->query("SHOW TABLES LIKE 'sb_artikel'")->fetchColumn();
        if($exists !== 'sb_artikel'){
	    	$db->exec("CREATE TABLE IF NOT EXISTS `sb_themen` (
					  `thema_id` varchar(32) NOT NULL,
					  `titel` varchar(255) NOT NULL,
					  `user_id` varchar(32) NOT NULL,
					  `mkdate` int(20) NOT NULL default '0',
					  `beschreibung` text,
					  `perm` varchar(255) NOT NULL,
					  `visible` tinyint(2) NOT NULL default '0',
					  PRIMARY KEY  (`thema_id`)
					) TYPE=MyISAM;");
	    	$db->exec("CREATE TABLE IF NOT EXISTS `sb_artikel` (
					  `artikel_id` varchar(32) NOT NULL,
					  `thema_id` varchar(32) NOT NULL,
					  `user_id` varchar(32) NOT NULL,
					  `titel` varchar(255) NOT NULL,
					  `beschreibung` text NOT NULL,
					  `mkdate` int(20) NOT NULL,
					  `visible` tinyint(2) NOT NULL default '0',
					  PRIMARY KEY  (`artikel_id`),
					  KEY `visible` (`visible`,`mkdate`),
					  KEY `thema_id` (`thema_id`)
					) TYPE=MyISAM;");
	    	$db->exec("CREATE TABLE IF NOT EXISTS `sb_visits` (
					  `object_id` char(32) NOT NULL default '',
					  `user_id` char(32) NOT NULL default '',
					  `type` enum('thema','artikel') NOT NULL default 'thema',
					  `last_visitdate` int(20) NOT NULL default '0',
					  PRIMARY KEY  (`object_id`,`user_id`),
					  KEY `user_id` (`user_id`,`last_visitdate`)
					) TYPE=MyISAM;");
	    	$db->exec("INSERT IGNORE INTO `config`
	    	( `config_id` , `parent_id` , `field` , `value` , `is_default` , `type` , `range` , `section` , `position` , `mkdate` , `chdate` , `description` , `comment` , `message_template` )
 			VALUES (
 			'edfb16e3830a7e9e1a3ad6e1ef2c71dg', '', 'BULLETIN_BOARD_DURATION', '30', '1', 'integer', 'global', 'SchwarzesBrettPlugin', '0', '0', '1100709567', 'Wie lange dürfen Anzeigen auf dem schwarzen Brett erscheinen (in Tagen)', 'Default: 30', ''
			)");
	    	$db->exec("INSERT IGNORE INTO `config` ( `config_id` , `parent_id` , `field` , `value` , `is_default` , `type` , `range` , `section` , `position` , `mkdate` , `chdate` , `description` , `comment` , `message_template` )
			VALUES (
			'edfb16e3830a7e9e1a3ad6e1ef2c71de', '', 'BULLETIN_BOARD_ANNOUNCEMENTS', '20', '1', 'integer', 'global', 'SchwarzesBrettPlugin', '0', '0', '1100709567', 'Wieviele Anzeigen sollen in der Übersicht angezeigt werden?', 'Default: 20', ''
			)");
        }
    }

    function down ()
    {

    }
}
?>