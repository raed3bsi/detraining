<script type="text/javascript">
    function savetpotype(formid){
        var data=$("#"+formid);
            var posting=$.post($("#"+formid).attr('action'),$(data).serialize() );
            $("#w").window('close');
            posting.done(function(data){
                $("#tporgtypedg").datagrid('reload');
                refreshMenu();
                
                //$("#tid").val(data);
                //alert("testid:"+$("#tid").val());
            });
    }
    
</script>
<div >
    <?= $this->Form->create($tporganizationtype, ['id' => 'tpotform']) ?>
    <fieldset>
        <legend><?= __($op.' Tporganizationtype') ?></legend>
        <?php
            echo $this->Form->input('orgtypename');
            //echo $this->Form->input('structureid');
        ?>
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="savetpotype('tpotform')">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelwindow()">Cancel</a>
    <?= $this->Form->end() ?>
</div>
