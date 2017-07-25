<script type="text/javascript">
    function refreshcities(record){
        console.info(record);
        $("#citylist").combobox('reload','/detraining/city/findlist/'+record.countryid);
        //$("#citylist").focus();
    }
    
    function addcity(e){
            $('#acdd').dialog({
            title: 'New City',
            width: 500,
            height: 500,
            closed: true,
            cache: false,
            href: '/detraining/city/add',
            modal: true
        });
        $('#acdd').dialog('open');
        
    }
    
    function saveorganization(){
        
    }
</script>
<div class="tporganization form large-9 medium-8 columns content">
    <?= $this->Form->create($tporganization, ['id' => 'addorgform']) ?>
    <fieldset>
        <legend><?= __($operation).$orgtypename ?></legend>
        <?php
            echo $this->Form->input('organizationname', ['label' => __('Organization name: ')]);
            echo $this->Form->input('address.addressid',['type' => 'hidden']);
            echo $this->Form->input('address.city.countryid', ['class' => 'easyui-combobox', 
                'label' => 'Country: ','type' => 'text',
                'data-options' => "limitToList: true, onSelect: refreshcities, url: '/detraining/country/findlist', "
                . "method: 'get', valueField: 'countryid', textField: 'countryname'"]);
            
            
            echo $this->Form->input('address.cityid', ['label' => 'City', 'id' => 'citylist', 'class' => 'easyui-combobox',
                'type' => 'text',
                'data-options' => "valueField: 'cityid',textField: 'cityname',"
                . "iconWidth:22,
                    icons:[{
                        iconCls:'icon-add',
                        handler: function(e){addcity(e);}
                    }]"]);
            
            echo $this->Form->input('address.addressline1', ['label' => 'Address line 1: ']);
            echo $this->Form->input('address.addressline2', ['label' => 'Address line 2: ']);
            echo $this->Form->input('organizationdescription', ['label' => 'Description']);
            echo $this->Form->input('orgtypeid',['type' => 'hidden']);
            echo $this->Form->input('rootunitid',['type' => 'hidden']);
        ?>
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="savewindow('addorgform','tporgs')">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelwindow()">Cancel</a>
    <?= $this->Form->end() ?>
    <div id="acdd"></div>
</div>

