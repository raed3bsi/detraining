<div class="easyui-panel" id="<?= $mm['id'] ?>" title="<?= $mm['name'] ?>" style="width:100%;">
    <div class="easyui-menu" data-options="inline:true" style="width:100%">
    <?php foreach ($mm['items'] as $mitem): ?>
                <?php echo $this->element('general/'.$mitem['viewelem'], ['mitem' => $mitem]); ?>
    <?php endforeach;?>
        </div>
            </div>
