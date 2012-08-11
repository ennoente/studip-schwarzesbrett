<?
class RssOptional extends DBMigration
{
    function description ()
    {
        return 'config eintraege fuer rss werden angelegt';
    }

    function up ()
    {
        $db = DBManager::get();
        $db->exec("INSERT IGNORE INTO `config` ( `config_id` , `parent_id` , `field` , `value` , `is_default` , `type` , `range` , `section` , `position` , `mkdate` , `chdate` , `description` , `comment` , `message_template` )
        VALUES (
        MD5('BULLETIN_BOARD_ENABLE_RSS'), '', 'BULLETIN_BOARD_ENABLE_RSS', '1', '1', 'boolean', 'global', 'SchwarzesBrettPlugin', '0', '0', '1100709567', 'RSS Feeds aktivieren', '', ''
        )");
    }

    function down ()
    {
        $db = DBManager::get();
        $db->exec("DELETE FROM `config` WHERE `config_id`=MD5('BULLETIN_BOARD_ENABLE_RSS')");
    }
}
?>