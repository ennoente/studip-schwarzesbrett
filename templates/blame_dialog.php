<div class="modaloverlay">
    <div class="messagebox">
        <?= formatReady($question) ?>
        <form name="add" method="post" action="<?=$approvalLink ?>">        
        <textarea placeholder="Grund" style="width: 100%;" name="blame_reason"></textarea>
        <div style="margin-top: 1em;">
            <?= makebutton('ja', "input")?>
            <a href="<?= $disapprovalLink ?>" style="margin-left: 1em;">
                <?= makebutton('nein') ?>
            </a>
        </div>
        </form>
    </div>
</div>
