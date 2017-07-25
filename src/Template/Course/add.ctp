
<div class="course form large-9 medium-8 columns content">
    <?= $this->Form->create($course,['id' => 'addcourseform']) ?>
    <fieldset>
        <legend><?= __('Add Course') ?></legend>
        <?php
            echo $this->Form->input('coursenumber',['class' => 'easyui-textbox', 'label' => false,
                'data-options' => "label: 'Course number: '", 'style' => 'width:70%;']);
            echo $this->Form->input('coursename',['class' => 'easyui-textbox', 'label' => false,
                'data-options' => "label: 'Course name: '", 'style' => 'width:70%;']);
            echo $this->Form->input('categoryid', ['options' => $categories, 'label' => false,
                'data-options' => "label: 'Course category: '",
                'class' => 'easyui-combobox', 'style' => 'width:70%;']);
            //echo $this->Form->input('coursestatus');
            echo $this->Form->input('versions.0.versionname',['class' => 'easyui-textbox', 'label' => false,
                'data-options' => "label: 'Version name: '", 'style' => 'width:70%;']);
            echo $this->Form->input('versions.0.traininghours',['class' => 'easyui-textbox','label' => false,
                'data-options' => "label: 'Training hours: '", 'style' => 'width:70%;']);
            echo $this->Form->input('versions.0.coursedescription',['class' => 'easyui-textbox','label' => false,
                'data-options' => "label:'Course description: ',multiline: true",'style' => 'width:70%;height:100px']);
            echo $this->Form->input('versions.0.courseobjectives',['class' => 'easyui-textbox','label' => false,
                'data-options' => "label:'Course objectives: ',multiline: true",'style' => 'width:70%;height:100px']);
            echo $this->Form->input('versions.0.coursegoals',['class' => 'easyui-textbox','label' => false,
                'data-options' => "label:'Course goals: ',multiline: true",'style' => 'width:70%;height:100px']);
//            echo $this->Form->input('versions.0.service.serviceprice');
  //          echo $this->Form->input('versions.0.service.pricecurrency',['options' => $categories]);
            echo $this->Form->input('fieldofstudy._ids', ['options' => $fieldofstudy, 'label' => false,
                'data-options' => "label: 'Fields of study: '",
                'class' => 'easyui-combobox', 'style' => 'width:70%;']);
        ?>
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="savewindow('addcourseform','coursedg')">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelwindow()">Cancel</a>
    <?= $this->Form->end() ?>
</div>
