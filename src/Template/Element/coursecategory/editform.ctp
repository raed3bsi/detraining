<div>
    <?= $this->Form->create($coursecategory,['id' => 'addcatform']) ?>
    <fieldset>
        <legend><?= __('Add Course category') ?></legend>
        <?php
            echo $this->Form->input('categoryname',['label' => 'Category name']);
            echo $this->Form->input('parentcategory',['type' => 'hidden']);
            
        ?>
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="savewindowtg('addcatform','ccattab')">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelwindow()">Cancel</a>
    <?= $this->Form->end() ?>
</div>

