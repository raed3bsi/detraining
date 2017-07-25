<script type="text/javascript">
    function submitform(){
        var data=$("#ajform");
            var posting=$.post($("#ajform").attr('action'),$(data).serialize() );
            $("#njd").tooltip('hide');
            posting.done(function(data){
                
                $("#pjlist").combobox('reload');
                
        
                //$("#tid").val(data);
                //alert("testid:"+$("#tid").val());
            });
    }
    
    function cancelform(){
        $("#njd").tooltip('hide');
    }
</script>
    <?= $this->Form->create($abstractjob,['id' => 'ajform']) ?>
    <fieldset>
        <legend><?= __('Add Abstractjob') ?></legend>
        <?php
            echo $this->Form->input('jobname',['label' => 'Job name']);
            echo $this->Form->input('jobtooltip',['label' => 'Job description']);
            echo $this->Form->input('sgroupid',['type' => 'hidden']);
        ?>
    </fieldset>
<a href="#" class="easyui-linkbutton" onclick="submitform()">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelform()">Cancel</a>
    <?= $this->Form->end() ?>

