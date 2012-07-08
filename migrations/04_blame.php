<?
class Blame extends DBMigration
{
    function description ()
    {
        return 'config eintraege fuer blame funktion werden angelegt';
    }

    function up ()
    {
        $db = DBManager::get();
        $db->exec("INSERT IGNORE INTO `config` ( `config_id` , `parent_id` , `field` , `value` , `is_default` , `type` , `range` , `section` , `position` , `mkdate` , `chdate` , `description` , `comment` , `message_template` )
        VALUES (
        MD5('BULLETIN_BOARD_BLAME_RECIPIENTS'), '', 'BULLETIN_BOARD_BLAME_RECIPIENTS', 'michael.schaarschmidt@urz.uni-halle.de', '1', 'string', 'global', 'SchwarzesBrettPlugin', '0', '0', '1100709567', 'Mailadressen, an die die Nachricht geschickt werden soll', '', ''
        )");
        $db->exec("INSERT IGNORE INTO `config` ( `config_id` , `parent_id` , `field` , `value` , `is_default` , `type` , `range` , `section` , `position` , `mkdate` , `chdate` , `description` , `comment` , `message_template` )
        VALUES (
        MD5('BULLETIN_BOARD_ENABLE_BLAME'), '', 'BULLETIN_BOARD_ENABLE_BLAME', '1', '1', 'boolean', 'global', 'SchwarzesBrettPlugin', '0', '0', '1100709567', 'Blame Funktion aktivieren', '', ''
        )");
    }

    function down ()
    {
        $db = DBManager::get();
        $db->exec("DELETE FROM `config` WHERE `config_id`=MD5('BULLETIN_BOARD_BLAME_RECIPIENTS')");
        $db->exec("DELETE FROM `config` WHERE `config_id`=MD5('BULLETIN_BOARD_ENABLE_BLAME')");
    }
}
?>