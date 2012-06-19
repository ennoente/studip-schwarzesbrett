<?
class Blacklist extends DBMigration
{
    function description ()
    {
        return 'es wird eine neue db für benutzer auf einer schwarzen liste erstellst.';
    }

    function up ()
    {
        $db = DBManager::get();
        $db->exec("CREATE TABLE IF NOT EXISTS `sb_blacklist` (
                      `user_id` varchar(32) NOT NULL,
                      `mkdate` int(20) NOT NULL default '0',
                      PRIMARY KEY (`user_id`)
                    ) ENGINE=MyISAM;");
    }

    function down ()
    {

    }
}