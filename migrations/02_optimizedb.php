<?
class Optimizedb extends DBMigration
{
    function description ()
    {
        return 'es werden neue indexe für die datenbank-tabellen angelegt.';
    }

    function up ()
    {
        $db = DBManager::get();
        $db->exec("ALTER TABLE `sb_visits` DROP INDEX `user_id`");
        $db->exec("ALTER IGNORE TABLE `sb_visits` ADD INDEX ( `user_id` , `last_visitdate` )");
        $db->exec("ALTER IGNORE TABLE `sb_artikel` ADD INDEX ( `visible` , `mkdate` )");
        $db->exec("ALTER IGNORE TABLE `sb_artikel` ADD INDEX ( `thema_id` )");
    }

    function down ()
    {

    }
}
?>