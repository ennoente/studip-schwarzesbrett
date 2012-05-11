<?= $message ?>

<? if (count($users) > 0) : ?>
<h3>Personen auf der schwarzen Liste:</h3>
<table class="default">
    <tr>
        <th></th>
        <th>Benutzer</th>
        <th></th>
    </tr>
<? foreach ($users as $i => $user) : ?>
    <tr class="<?= TextHelper::cycle('cycle_odd', 'cycle_even') ?>">
        <td align="right" width="1%"><?= $i+1 ?>.</td>
        <td>
            <a href="<?= URLHelper::getLink('about.php', array('username' => get_username($user['user_id']))) ?>">
                <?= get_fullname($user['user_id']) ?>
            </a>
        </td>
        <td align="right">
            <a href="<?= URLHelper::getLink($link, array('user_id' => $user['user_id'], 'action' => 'delete')) ?>">
                <?= Assets::img('icons/16/blue/trash.png', array('title' => _('Benutzer von der schwarzen Liste entfernen'), 'class' => 'text-top')) ?>
            </a>
        </td>
    </tr>
<? endforeach ?>
</table>
<? else : ?>
<?= MessageBox::info(_('Es befinden sich keine Benutzer auf der schwarzen Liste.')) ?>
<? endif ?>

<br>
<h3>Benutzer auf die schwarze Liste setzen</h3>
<form method="post" action="<?= $link ?>">
<input type="hidden" name="action" value="add">
<?= QuickSearch::get('user_id', new StandardSearch('user_id'))->withButton()->render() ?>
<?= makeButton('hinzufuegen', 'input', 'Benutzer suchen') ?>
</form>