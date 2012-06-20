<?= $message ?>

<form method="post" action="<?= $link ?>">
<input type="hidden" name="action" value="save">
<table class="default">
    <tbody>
        <tr class="cycle_odd">
            <td>Wie lange dürfen Anzeigen auf dem schwarzen Brett erscheinen (in Tagen)</td>
            <td><input type="text" class="allow-only-numbers" name="duration" value="<?=$duration ?>"></td>
        </tr>
        <tr class="cycle_even">
            <td>Wieviele Anzeigen sollen in der Übersicht angezeigt werden?</td>
            <td><input type="text" class="allow-only-numbers" name="announcements" value="<?=$announcements ?>"></td>
        </tr>
        <tr class="cycle_odd">
            <td>Mailadressen, an die die Blame Nachricht geschickt werden soll</td>
            <td><input type="text" name="blameRecipients" value="<?=$blameRecipients ?>"></td>
        </tr>
        <tr class="steel2">
            <td>&nbsp;</td>
            <td><?= makeButton('speichern', 'input', 'Einstellungen speichern') ?></td>
        </tr>
    </tbody>
</table>
</form>