<form name="search_form" method="post" action="<?=$link_search?>">
<div class="topic"><b>Allgemeine Suche nach Anzeigen:</b></div>
<div class="steel1" style="padding:5px;">Nach Anzeigen suchen:
    <input type="text" style="width:200px;" name="search_text" value="<?=htmlready(Request::get('search_text'))?>" />
    <?=makebutton("suchen","input", "nach Anzeigen suchen", "submit")?>
    <a href="<?=$link_back?>"><?=makebutton("zuruecksetzen","img", "zurücksetzen")?></a>
</div>
</form>
<br/>
<div class="topic"><b>Ergebnisse alphabetisch sortiert, gruppiert nach Themen:</b></div>
<? foreach ($results as $result): ?>
<table border="0" cellpadding="2" cellspacing="0" width="100%" style="margin-bottom:3px;">
    <tr class="steel1">
        <td>
        <div style="float:left">
            <b><?=$result['thema_titel']?></b><br/>
        </div>
        <div style="float:right">
                <a href="javascript: toggleThema('<?=$result['thema_id']?>');">
                    <?= Assets::img('icons/16/blue/arr_eol-down.png', array('id' => 'show_'.$result['thema_id'], 'class' => 'text-top', 'title' => _('Alle Artikel anzeigen'), 'style' => 'display:none;')) ?>
                    <?= Assets::img('icons/16/blue/arr_eol-up.png', array('id' => 'hide_'.$result['thema_id'], 'class' => 'text-top', 'title' => _('Alle Artikel verstecken'))) ?>
                </a>
        </div>
        <div style="clear:both; border-bottom: 1px solid #8e8e8e;"></div>
        <div id="list_<?=$result['thema_id']?>">
        <table border="0" cellpadding="5" cellspacing="0" width="100%">
            <? foreach ($result['artikel'] as $index => $a): ?>
            <tr>
                <td class="<?=($index%2==0)?'steel1':'steelgraulight'?>">
                <?=$a ?>
                </td>
            </tr>
            <? endforeach; ?>
        </table>
        </div>
        </td>
    </tr>
</table>
<? endforeach ?>
