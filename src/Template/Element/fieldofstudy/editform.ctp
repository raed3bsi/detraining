<div >
    <?= $this->Form->create($fieldofstudy, ['id' => 'fosform']) ?>
    <fieldset>
        <legend><?= __($op.' Field of study') ?></legend>
        <?php
            echo $this->Form->input('fieldofstudyname');
            //echo $this->Form->input('structureid');
        ?>
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="savewindow('fosform','fosdg')">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelwindow()">Cancel</a>
    <?= $this->Form->end() ?>
</div>
