<script type="text/javascript">
    function editfos(){
        var node = $('#fosdg').datagrid('getSelected');
            if (node){
                
                var url= "/detraining/fieldofstudy/edit/"+node.fieldofstudyid;
                openwindow(url);
                //$('#tg').treegrid('remove', node.id);
            }
    }
    
    function removefos(){
        var node = $('#fosdg').datagrid('getSelected');
        if(node){
            $("#confirmdialog").children("p").replaceWith($("#cdpattern").html()
                    .replace("%t",node.fieldofstudyname));
            var url="/detraining/fieldofstudy/delete/"+node.fieldofstudyid;
            removeconfirmdialog("confirmdialog",url,"fosdg");
        }
        else{
            alert("Please, select an item to remove");
        }
    }
    
</script>


<div>
    <table id="fosdg" class="easyui-datagrid" title="<?= __('Fields of study') ?>"
           data-options="singleSelect:true,collapsible:true,url:'/detraining/fieldofstudy/loadContents',method:'get',
           toolbar:'#fostb'">
        <thead>
            <tr>
                <th data-options="field: 'fieldofstudyname'">Type name</th>
                
            </tr>
        </thead>
        
    </table>
    
    <div id="fostb" style="padding: 2px 5px;">
        <a href="#" class="easyui-linkbutton" 
           onclick="openwindow('/detraining/fieldofstudy/add')" 
           iconCls="icon-add" plain="true"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
           onclick="editfos()"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
           onclick="removefos()"> </a>
        
    </div>
    
</div>
<div id="confirmdialog" style="display: none;width:400px;height:200px;padding:10px">
    <p>
        </p>
    
    </div>

<div id="cdpattern" style="display: none;">
    <p>
    <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
        Are you sure you want to remove "%t"?
        </p>
</div>

