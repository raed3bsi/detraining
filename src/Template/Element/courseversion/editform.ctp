<script type="text/javascript">
    function saveversion(){
        savewindow('cversionform','cversiondg');
        $("#cdpg").propertygrid('reload');
    }
</script>
<div >
    <?= $this->Form->create($courseversion,['id' => 'cversionform']) ?>
    <fieldset>
        <legend><?= __($operation.' Course version') ?></legend>
        <?php
            //echo $this->Form->input('courseid');
            //echo $this->Form->input('versionseq');
            echo $this->Form->input('versionname');
            echo $this->Form->input('coursedescription');
            echo $this->Form->input('courseobjectives');
            echo $this->Form->input('coursegoals');
            //echo $this->Form->input('serviceid');
            //echo $this->Form->input('documentid');
            //echo $this->Form->input('createdby');
            //echo $this->Form->input('versionstatus');
            echo $this->Form->input('traininghours');
            
        ?>
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="saveversion()">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelwindow()">Cancel</a>
    <?= $this->Form->end() ?>
</div>

