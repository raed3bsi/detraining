
<div >
    <?= $this->Form->create($specialization,['id' => 'addspecform']) ?>
    <fieldset>
        <legend><?= __('Add Specialization') ?></legend>
        <?php
            echo $this->Form->input('specializationname');
            echo $this->Form->input('specializationdescription');
            
        ?>
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="savewindow('addspecform','specializationdg')">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelwindow()">Cancel</a>
    <?= $this->Form->end() ?>
</div>
