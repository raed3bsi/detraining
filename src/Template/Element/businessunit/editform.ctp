<script type="text/javascript">
    function submitform(){
                
        var data=$("#buform");
            var posting=$.post($("#buform").attr('action'),$(data).serialize() );
            $("#w").window('close');
            posting.done(function(data){
                
                $("#tg").treegrid('reload');
                
                //$("#tid").val(data);
                //alert("testid:"+$("#tid").val());
            });
    }
    function cancelform(){
        $("#w").window('close');
    }
</script>
<div class="businessunit form large-9 medium-8 columns content">
    <?= $this->Form->create($businessunit,['id' => 'buform']) ?>
    <fieldset>
        <legend><?= __('Add Businessunit') ?></legend>
        <?php
            echo $this->Form->input('superunitid',['type' => 'hidden']);
            echo $this->Form->input('butypeid',['type' => 'hidden']);
            echo $this->Form->input('businessunitname',['label' => __('Unit name')]);
            echo $this->Form->input('businessunitstatus',['type' => 'hidden']);
            echo $this->Form->input('expirationdate', ['empty' => true, 'type' => 'hidden']);
            
        ?>
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="submitform()">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelform()">Cancel</a>
    <?= $this->Form->end() ?>
</div>

