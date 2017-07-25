<div >
    <?= $this->Form->create($coursematerial,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Coursematerial') ?></legend>
        <input class="easyui-filebox" name="tmaterials[]" label="Material files:" labelPosition="top" 
               data-options="prompt:'Select materials...', multiple: true" style="width:100%">
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
