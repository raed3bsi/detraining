<script type="text/javascript">
    function addorganization(url,customtitle){
        //var url='/tporganization/add/';
        console.info($("#w").window());
        $("#w").window({
            title: customtitle,
        });
        $("#w").window('open');
        $("#w").window('refresh',url);
        
        //alert($("#w").attr("title"));
    }
    
    function editorganization(customtitle){
        var node=$("#tporgs").datagrid('getSelected');
        console.info(node);
        if(node){
            var url='/tporganization/edit/'+node.organizationid;
            addorganization(url,customtitle);
        }
        else{
            alert("Please select an organization to edit");
        }
    }
    
    function removeorganization(){
        var node=$("#tporgs").datagrid('getSelected');
        console.info(node);
        if(node){
            $("#confirmdialog").children("p").replaceWith($("#cdpattern").html()
                    .replace("%t",node.organizationname));
            var url='/tporganization/delete/'+node.organizationid;
            removeconfirmdialog("confirmdialog",url,"tporgs");
            

            
        }
        else{
            alert("Please select an organization to remove");
        }
    }
    
    function organizationstructure(){
        var node=$("#tporgs").datagrid('getSelected');
        console.info(node);
        if(node){
            var url='/businessunit/index/'+node.rootunitid;
            menuredirect(url);
            
        }
        else{
            alert("Please select an organization to view its structure");
        }
    }
</script>
<div class="tporganization index large-9 medium-8 columns content">
    
    <table id="tporgs" class="easyui-datagrid" cellpadding="0" cellspacing="0" title="<?= $orgtypename ?>"
           data-options="singleSelect:true,collapsible:true,url:'/tporganization/loadcontent',method:'get',
           toolbar:'#tporgtb'">
        <thead>
            <tr>
                <th data-options="field: 'organizationname'">Organization name</th>
                <th data-options="field: 'cityfullname'">Address</th>
                
            </tr>
        </thead>
        
    </table>
    <div id="tporgtb" style="padding: 2px 5px;">
        <a href="#" class="easyui-linkbutton" 
           onclick="addorganization('/tporganization/add/','<?= 'Add '.$orgtypename ?>')" 
           iconCls="icon-add" plain="true">Add <?= $orgtypename ?></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
           onclick="editorganization('<?= 'Edit '.$orgtypename ?>')">Edit <?= $orgtypename ?></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
           onclick="removeorganization()">Remove <?= $orgtypename ?></a>
        <a href="#" class="easyui-linkbutton" plain="true" onclick="organizationstructure()">
            <?= $orgtypename ?> structure
        </a>
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