<? if (count($results) > 0) : ?>
<h3>Benutzer mit mehr als einem Eintrag</h3>
<table class="default">
    <tr>
        <th></th>
        <th>Benutzer</th>
        <th>Anzeigen</th>
    </tr>
    <? foreach ($results as $i => $result) : ?>
    <tr class="<?= TextHelper::cycle('cycle_odd', 'cycle_even') ?>">
        <td width="1%" align="right"><?= $i+1 ?>.</td>
        <td>
                <a href="<?= URLHelper::getLink('about.php', array('username' => get_username($result['user_id']))) ?>">
                    <?= get_fullname($result['user_id']) ?>
                </a>
        </td>
        <td>
        <table class="default">
        <? foreach ($result['artikel'] as $artikel) : ?>
        <tr>
            <td><?= date("d.m.Y", $artikel['mkdate']) ?>:
            <a href="<?= URLHelper::getLink($link, array('modus' => 'show_search_results', 'search_user' => $result['user_id'])) ?>">
                <?= htmlReady($artikel['titel']) ?> (<?= htmlReady($artikel['thema']) ?>)
            </a>
            </td>
            <td align="right">
                <a href="<?= URLHelper::getLink($link_edit, array('artikel_id' => $artikel['artikel_id'], 'thema_id' => $artikel['thema_id'])) ?>">
                    <?= Assets::img('icons/16/blue/edit.png', array('title' => 'Anzeige bearbeiten', 'class' => 'text-top')) ?>
                </a>
                <a href="<?= URLHelper::getLink($link_delete, array('artikel_id' => $artikel['artikel_id'])) ?>">
                    <?= Assets::img('icons/16/blue/trash.png', array('title' => 'Anzeige löschen', 'class' => 'text-top')) ?>
                </a>
            </td>
        </tr>
        <? endforeach ?>
        </table></td>

    </tr>
    <? endforeach ?>
</table>
<? else : ?>
<?= MessageBox::info(_('Es sind keine doppelten Einträge vorhanden.')) ?>
<? endif ?>