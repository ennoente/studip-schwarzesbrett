<?php

/**
 * Thema.class.php
 *
 * Eine Klasse für die Kategorien des schwarzen Brettes.
 * In diesem Plugin Thema genannt.
 *
 * @author      Jan-Hendrik Willms <tleilax+studip@gmail.com>
 * @author		Jan Kulmann <jankul@zmml.uni-bremen.de>
 * @author		Michael Riehemann <michael.riehemann@uni-oldenburg.de>
 * @package 	IBIT_SchwarzesBrettPlugin
 * @copyright	2009 IBIT und ZMML
 * @version 	2.2
 */

/**
 * Klasse für Themen-Objekte
 *
 */
class Thema
{
    /**
     * Titel des Themas
     *
     * @var string
     */
    private $titel;

    /**
     * Beschreibung des Themas
     *
     * @var string
     */
    private $beschreibung;

    /**
     * Die ID des Erstellers
     *
     * @var string
     */
    private $user_id;

    /**
     * Sichtbarkeitsstatus für andere Benutzer
     *
     * @var boolean
     */
    private $visible;

    /**
     * Die ID des Themas
     *
     * @var unknown_type
     */
    private $thema_id;

    /**
     * Benutzerrechte für dieses Thema
     *
     * @var string
     */
    private $perm;

    /**
     * Erstellungsdatum
     *
     * @var unknown_type
     */
    private $mkdatum;

    private $artikel_count;

    private $last_artikel_date;

    /**
     * Konstruktor, erstellt ein Objekt der Klasse Thema
     *
     * @param string $id
     * @return Thema
     */
    public function __construct($id = false)
    {
        if(!$id)
        {
            $this->titel = "";
            $this->beschreibung = "";
            $this->user_id = "";
            $this->visible = 0;
            $this->thema_id = "";
            $this->perm = "autor";
            $this->mkdatum = 0;
            $this->last_artikel_date = 0;

        }
        else
        {
            $query = "SELECT titel, beschreibung, user_id, visible, perm, thema_id, mkdate "
                   . "FROM sb_themen "
                   . "WHERE thema_id = ?";
            $statement = DBManager::get()->prepare($query);
            $statement->execute(array($id));
            $thema = $statement->fetch(PDO::FETCH_ASSOC);

            if(!empty($thema))
            {
                $this->titel = $thema['titel'];
                $this->beschreibung = $thema['beschreibung'];
                $this->user_id = $thema['user_id'];
                $this->visible = $thema['visible'];
                $this->perm = $thema['perm'];
                $this->thema_id = $thema['thema_id'];
                $this->mkdatum = $thema['mkdate'];

                $query = "SELECT MAX(mkdate) FROM sb_artikel WHERE thema_id = ? AND visible = 1";
                $statement = DBManager::get()->prepare($query);
                $statement->execute(array($id));
                $this->last_artikel_date = $statement->fetchColumn();
            }
        }
        $this->artikel_count = 0;
        $this->last_thema_user_date = 0;
    }

    /**
     * Speichert ein Thema in die Datenbank. Entweder neu angelegt oder bearbeitet.
     *
     */
    public function save()
    {
        if (empty($this->titel)) {
            return;
        }

        if (empty($this->thema_id)) {
            $id = md5(uniqid(time()));

            $query = "INSERT INTO sb_themen (thema_id, titel, user_id, mkdate, beschreibung, visible, perm) "
                   . "VALUES (?, ?, ?, UNIX_TIMESTAMP(), ?, ?, ?)";
            DBManager::get()
                ->prepare($query)
                ->execute(array(
                    $id, $this->titel, $GLOBALS['auth']->auth['uid'],
                    $this->beschreibung, $this->visible, $this->perm,
                ));
        } else {
            $query = "UPDATE sb_themen SET titel = ?, beschreibung = ?, visible = ?, perm = ? "
                   . "WHERE thema_id = ?";
            DBManager::get()
                ->prepare($query)
                ->execute(array(
                    $this->titel, $this->beschreibung, $this->visible,
                    $this->perm, $this->thema_id,
                ));
        }
    }

    /**
     * Löscht ein thema aus der Datenbank
     *
     */
    public function delete()
    {
        if ($this->thema_id) {
            $query = "DELETE FROM sb_visits WHERE object_id = ?";
            DBManager::get()
                ->prepare($query)
                ->execute(array($this->thema_id));

            $query = "DELETE FROM sb_artikel WHERE thema_id = ?";
            DBManager::get()
                ->prepare($query)
                ->execute(array($this->thema_id));

            $query = "DELETE FROM sb_themen WHERE thema_id = ?";
            DBManager::get()
                ->prepare($query)
                ->execute(array($this->thema_id));
        }
    }

    public function setTitel($s)
    {
        $this->titel = trim($s);
    }

    public function setBeschreibung($s)
    {
        $this->beschreibung = trim($s);
    }

    public function setUserId($s)
    {
        $this->user_id = $s;
    }

    public function setVisible($s)
    {
        $this->visible = $s;
    }

    public function setThemaId($s)
    {
        $this->thema_id = $s;
    }

    public function setPerm($s)
    {
        $this->perm = $s;
    }

    public function getTitel()
    {
        return $this->titel;
    }

    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

    function getUserId()
    {
        return $this->user_id;
    }

    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Gibt die Id des Themas zurück
     *
     * @return string
     */
    public function getThemaId()
    {
        return $this->thema_id;
    }

    public function getPerm()
    {
        return $this->perm;
    }

    public function getMkdate()
    {
        return $this->mkdatum;
    }

    public function setArtikelCount($c)
    {
        $this->artikel_count = $c;
    }

    public function getArtikelCount()
    {
        return $this->artikel_count;
    }

    public function getLastArtikelDate()
    {
        return $this->last_artikel_date;
    }
}
?>
