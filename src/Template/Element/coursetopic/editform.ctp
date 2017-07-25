<div>
    <?= $this->Form->create($coursetopic,['id' => 'addtopicform']) ?>
    <fieldset>
        <legend><?= __($operation.' Course topic') ?></legend>
        <?php
            echo $this->Form->input('topictitle',['label' => 'Title']);
            echo $this->Form->input('traininghours',['label' => 'Training hours']);
            echo $this->Form->input('topicdescription',['label' => 'Description']);
        ?>
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="savewindowtg('addtopicform','ctopictg')">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelwindow()">Cancel</a>
    <?= $this->Form->end() ?>
</div>

