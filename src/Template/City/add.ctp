<script type="text/javascript">
    function submitform(){
        var data=$("#acform");
            var posting=$.post($("#acform").attr('action'),$(data).serialize() );
            $("#acdd").dialog('close');
            posting.done(function(data){
                
                $("#citylist").combobox('reload');
                
        
                //$("#tid").val(data);
                //alert("testid:"+$("#tid").val());
            });
    }
    
    function cancelform(){
        $("#acdd").dialog('close');
    }
</script>
    
<?= $this->Form->create($city, ['id' => 'acform']) ?>
    <fieldset>
        <legend><?= __('Add City') ?></legend>
        <?php
            echo $this->Form->input('cityname',['label' => 'City name: ']);
            echo $this->Form->input('countryid', ['options' => $country, 'label' => 'Country']);
            
        ?>
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="submitform()">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelform()">Cancel</a>
    <?= $this->Form->end() ?>

