
<div class="course form large-9 medium-8 columns content">
    <?= $this->Form->create($course,['id' => 'addcourseform']) ?>
    <fieldset>
        <legend><?= __('Edit Course') ?></legend>
        <?php
            echo $this->Form->input('coursenumber');
            echo $this->Form->input('coursename');
            echo $this->Form->input('categoryid', ['options' => $categories]);

            echo $this->Form->input('fieldofstudy._ids', ['options' => $fieldofstudy]);
        ?>
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="savewindow('addcourseform','coursedg')">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelwindow()">Cancel</a>
    <?= $this->Form->end() ?>
</div>
