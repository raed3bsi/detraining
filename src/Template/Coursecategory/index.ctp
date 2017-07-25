<script type="text/javascript">
    function addcategory(){
        var node = $('#ccattab').treegrid('getSelected');
        var url='/coursecategory/add/';
        if(node){
            if(node.nocourses>0){
                //alert error
                return;
            }
            console.info(node);
            url=url+node.categoryid;
        }
        $("#w").window('open');
        $("#w").window('refresh',url);
    }
    
    function editcategory(){
        var node = $('#ccattab').treegrid('getSelected');
        if(node){
            var url='/coursecategory/edit/'+node.categoryid;
            $("#w").window('open');
            $("#w").window('refresh',url);
        }
    }
    
    function removecategory(){
        var node = $('#ccattab').treegrid('getSelected');
        if(node){
            $("#confirmdialog").children("p").replaceWith($("#cdpattern").html()
                    .replace("%t",node.categoryname));
            var url="/coursecategory/delete/"+node.categoryid;
            removeconfirmdialog("confirmdialog",url,"ccattab");
        }
        else{
            alert("Please, select an item to remove");
        }
    }
</script>
<div style="height: 100%;">
    <div style="width: 40% !important; height: 100%; float: left; margin-right: 0px;">
    <table id="ccattab" class="easyui-treegrid" title="<?= __('Course categories') ?>" 
           toolbar="#nptb" style="height: 100%;"
           data-options="url: '/coursecategory/loadContents',method:'get',rownumbers: true,
           idField:'categoryid',treeField:'categoryname'">
        <thead>
            <tr>
                <th data-options="field:'categoryname'">Category name</th>
                
                
            </tr>
        </thead>
        
    </table>
    </div>
    
    <div id="nptb" style="padding: 2px 5px; display: none;">
        <a href="#" onclick="addcategory()" class="easyui-linkbutton" iconCls="icon-add" tooltip="Add" plain="true"></a>
        <a href="#" onclick="editcategory()" class="easyui-linkbutton" iconCls="icon-edit" plain="true"></a>
        <a href="#" onclick="removecategory()" class="easyui-linkbutton" iconCls="icon-remove" plain="true"></a>
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