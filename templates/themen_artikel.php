<table border="0" cellpadding="5" cellspacing="0" width="100%">
<? foreach ($result['artikel'] as $index => $a): ?>
    <tr class="<?= TextHelper::cycle('cycle_even', 'cycle_odd') ?>">
        <td>
            <?= $a ?>
        </td>
    </tr>
<? endforeach; ?>
<? if($result['thema']->getArtikelCount() == 0): ?>
    <tr>
        <td><span style="font-size: smaller;">keine Anzeigen vorhanden</span></td>
    </tr>
<? endif; ?>
</table>

<? if ($result['permission'] === true && !$blacklisted): ?>
<div align="center" style="padding: 3px;">
    <a href="<?= URLHelper::getLink($link_artikel, array('thema_id' => $result['thema']->getThemaId())) ?>">
        <img class="button" src="<?=$pluginpfad ?>/images/anzeige-button.png" alt="Eine neue Anzeige erstellen" title="Eine neue Anzeige erstellen" />
    </a>
</div>
<? endif; ?>