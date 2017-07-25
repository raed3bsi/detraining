<script type="text/javascript">
    function editspec(){
        var node = $('#specializationdg').datagrid('getSelected');
            if (node){
                
                var url= "/specialization/edit/"+node.specializationid;
                openwindow(url);
                //$('#tg').treegrid('remove', node.id);
            }
    }
    
    function removespec(){
        var node = $('#specializationdg').datagrid('getSelected');
        if(node){
            $("#confirmdialog").children("p").replaceWith($("#cdpattern").html()
                    .replace("%t",node.specializationname));
            var url="/specialization/delete/"+node.specializationid;
            removeconfirmdialog("confirmdialog",url,"specializationdg");
        }
        else{
            alert("Please, select an item to remove");
        }
    }
    
    function viewspec(){
        var node = $('#specializationdg').datagrid('getSelected');
        if(node){
            var url="/specialization/view/"+node.specializationid;
            window.location.href=url;
        }
        else{
            alert("Please, select an item to view");
        }
    }
</script>


<div>
    <table id="specializationdg" class="easyui-datagrid" title="<?= __('Specializations') ?>"
           data-options="singleSelect:true,collapsible:true,url:'/specialization/loadContents',method:'get',
           toolbar:'#spectb'">
        <thead>
            <tr>
                <th data-options="field: 'specializationname'">Specialization name</th>
                <th data-options="field: 'numoflevels'">Number of levels</th>
                
            </tr>
        </thead>
        
    </table>
    
    <div id="spectb" style="padding: 2px 5px;">
        <a href="#" class="easyui-linkbutton" 
           onclick="openwindow('/specialization/add')" 
           iconCls="icon-add" plain="true"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
           onclick="editspec()"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
           onclick="removespec()"> </a>
        <a href="#" class="easyui-linkbutton" plain="true"
           onclick="viewspec()"> <?= __('View details') ?></a>
        
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

