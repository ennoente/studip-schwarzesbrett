<?
class Rss extends DBMigration
{
    function description ()
    {
        return 'eintraege fuer rss werden angelegt';
    }

    function up ()
    {
        $db = DBManager::get();
        $db->exec("ALTER IGNORE TABLE `sb_artikel` ADD `publishable` tinyint(2) NOT NULL default '0'");
    }

    function down ()
    {
        $db = DBManager::get();
        $db->exec("ALTER IGNORE TABLE `sb_artikel` DROP `publishable`");
    }
}
?>