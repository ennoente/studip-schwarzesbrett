<?= $message ?>
<div class="topic"><b>Thema anlegen/bearbeiten:</b></div>
<form name="add" method="post" action="<?=$link?>">
    <input type="hidden" name="modus" value="save_thema">
    <input type="hidden" name="thema_id" value="<?=$t->getthemaid()?>">
    <table border="0" cellpadding="5" cellspacing="0" width="100%">
        <tr class="steel1">
            <td>Titel:</td>
            <td><input type="text" name="titel" value="<?=htmlready($t->gettitel())?>" style="width:500px;"></td>
        </tr>
        <tr class="steelgraulight">
            <td valign="top">Beschreibung:</td>
            <td><textarea name="beschreibung" style="width:500px; height:150px;"><?=htmlready($t->getbeschreibung())?></textarea></td>
        </tr>
        <tr class="steel1">
            <td>Berechtigung:</td>
            <td>
            <select name="thema_perm" size="1">
            <?
            $pe = array('autor','tutor','dozent','admin','root');
            foreach ($pe as $p): ?>
                <option value="<?=$p?>" <? if($t->getperm()==$p) echo'selected="selected"';?>><?=$p?></option>
            <? endforeach; ?>
            </select>
            Diese Berechtigung bezieht sich auf die Benutzer, die einen Artikel erstellen dürfen. Betrachten können alle Benutzer!
            </td>
        </tr>
        <tr class="steelgraulight">
            <td>sichtbar:</td>
            <td><input type="checkbox" name="visible" value="1" <? if($t->getvisible()) echo'checked="checked"';?>"></td>
        </tr>
        <tr class="steel2">
            <td colspan="2" align="center">
                <?=makebutton("speichern","input", "Das Thema speichern", "submit")?>
                <a href="<?=$link_exit?>"><?=makebutton("abbrechen","img", "Die Änderungen verwerfen")?></a>
            </td>
        </tr>
    </table>
</form>