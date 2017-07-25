
<div >
    <?= $this->Form->create($specializationlevel,['id' => 'addslevelform']) ?>
    <fieldset>
        <legend><?= __('Add Specialization level') ?></legend>
        <?php
            
            echo $this->Form->input('levelname');
            echo $this->Form->input('duration');
            echo $this->Form->input('course._ids', ['options' => $courses, 'class' => 'easyui-combobox']);
        ?>
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="savewindow('addslevelform','sleveldg')">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelwindow()">Cancel</a>
    <?= $this->Form->end() ?>
</div>
