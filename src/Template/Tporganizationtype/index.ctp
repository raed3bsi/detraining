<script type="text/javascript">
    function edittpotype(){
        var node = $('#tporgtypedg').datagrid('getSelected');
            if (node){
                
                var url= "/tporganizationtype/edit/"+node.orgtypeid;
                openwindow(url);
                //$('#tg').treegrid('remove', node.id);
            }
    }
    
    function removetpotype(){
        var node = $('#tporgtypedg').datagrid('getSelected');
        if(node){
            $("#confirmdialog").children("p").replaceWith($("#cdpattern").html()
                    .replace("%t",node.orgtypename));
            var url="/tporganizationtype/delete/"+node.orgtypeid;
            removeconfirmdialog("confirmdialog",url,"tporgtypedg");
        }
        else{
            alert("Please, select an item to remove");
        }
    }
    
</script>


<div>
    <table id="tporgtypedg" class="easyui-datagrid" title="<?= __('Types of organizations') ?>"
           data-options="singleSelect:true,collapsible:true,url:'/tporganizationtype/loadContents',method:'get',
           toolbar:'#tpotypetb'">
        <thead>
            <tr>
                <th data-options="field: 'orgtypename'">Type name</th>
                
            </tr>
        </thead>
        
    </table>
    
    <div id="tpotypetb" style="padding: 2px 5px;">
        <a href="#" class="easyui-linkbutton" 
           onclick="openwindow('/tporganizationtype/add')" 
           iconCls="icon-add" plain="true"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
           onclick="edittpotype()"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
           onclick="removetpotype()"> </a>
        
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

