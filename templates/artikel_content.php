<a id="close_<?=$a->getArtikelId()?>" href="javascript: closeArtikel('<?=$a->getArtikelId()?>');">
    <img id="indikator_offen_<?=$a->getArtikelId()?>" src="<?=$GLOBALS['ASSETS_URL']?>images/icons/16/blue/arr_1down.png" class="text-top">
    <?= htmlReady($a->getTitel()) ?>
</a>
<? if ($a->getVisible() == 0): ?>
    <?= Assets::img('icons/16/red/exclaim-circle.png', array('class' => 'text-top', 'title' => _('Diese Anzeige ist nicht für andere sichtbar'))) ?>
<? endif; ?>
<div style="border-bottom: 1px solid #8e8e8e; padding-bottom: 3px;">
    <?= formatReady($a->getBeschreibung())?>
</div>
<div align="right" style="font-size:smaller; padding:1px 0px 5px 0px;">
    erstellt von
    <a href="<?=URLHelper::getLink('about.php', array('username' => get_username($a->getUserId()))) ?>">
        <?=get_fullname($a->getUserId())?>
    </a> | gültig bis bis <?=date("d.m.Y",$a->getMkdate()+$zeit)?>
</div>
<div align="center" style="padding-bottom: 5px;">
<? if($antwort === true): ?>
    <a href="<?=URLHelper::getLink('sms_send.php', array('rec_uname' => get_username($a->getUserId()), 'messagesubject' => rawurlencode($a->getTitel()), 'message' => '[quote] '.$a->getBeschreibung().' [/quote]')) ?>">
        <?=makeButton("antworten","img", "Dem Benutzer eine Email schreiben")?>
    </a>
<? endif; if($access === true): ?>
    <a href="<?=$link_edit ?>">
        <?=makeButton("bearbeiten","img", "Diese Anzeige bearbeiten")?>
    </a>
    <a href="<?=$link_delete ?>">
        <?=makeButton("loeschen","img", "Diese Anzeige löschen")?>
    </a>
<? endif; ?>
</div>
