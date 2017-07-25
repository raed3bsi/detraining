<script type="text/javascript">
   
   function onContextMenu(e,row){
            if (row){
                e.preventDefault();
                //alert(row.businessunitid+":"+row.key);
                $(this).treegrid('select', row.key);
                $('#mm').menu('show',{
                    left: e.pageX,
                    top: e.pageY
                });                
            }
        }
    function editunit(){
        var node = $('#tg').treegrid('getSelected');
            if (node){
                var url= "/businessunit/edit/"+node.key;
                $("#w").window('open');
                $("#w").window('refresh',url);
            }
    }
    function removeunit(){
        var node = $('#tg').treegrid('getSelected');
        if(node){
            $("#confirmdialog").children("p").replaceWith($("#cdpattern").html().replace("%t",node.businessunitname));
                $("#confirmdialog").dialog({
                    closed: false,
                    cache: false,
                    modal: true,
                    resizable: false,
                    height: "auto",
                    width: 400,
                    modal: true,
                    buttons: [{
                    text:'Yes',
                    iconCls:'icon-ok',
                    handler:function(){
                        $.ajax({
                        url: "/businessunit/delete/"+node.key,
                        type: 'POST',
                        success: function (data, textStatus, jqXHR) {
                                    alert("unit removed");
                                    $("#tg").treegrid('reload');
                                    $( "#confirmdialog" ).dialog( 'close' );
                                }
            });
                        //window.location.href= "/coursetopic/delete/"+node.key;
                    }
                }
                ,{
                    text:'No',
                    handler:function(){
                        $( "#confirmdialog" ).dialog( 'close' );
                    }
                }]
    });
        }
        
    }
    
    function addunit(){
        var node = $('#tg').treegrid('getSelected');
        if(node){
            var url= "/businessunit/add/"+node.key;
            $("#w").window('open');
            $("#w").window('refresh',url);
            
        }
    }
    
    
    
    function buselected(row){
        $("#bupdg").datagrid({
            url: '/positions/index/'+row.key,
            fitColumns:true,
            title: row.businessunitname + ' Positions',
            singleSelect: true,
            collapsible:true,
            toolbar: '#nptb',
            columns:[[
                            {field:'positionname',title:'Position name',width:'40%'},
                            {field:'jobname',title:'Job name',width:'40%'},
                            {field:'maxnoinstances',title:'Maximum instances',width:'20%'}
                        ]]
        });
    }
    
    function addposition(){
        var node = $('#tg').treegrid('getSelected');
        if(node){
            var url='/positions/add/'+node.key;
            $("#w").window('open');
            $("#w").window('refresh',url);
        }
    }
</script>
<div >
    <div style="width: 50% !important; float: left; margin-right: 0px;">
    <table id="tg" class="easyui-treegrid" title="<?= __('DE Organization structure') ?>" 
           
           data-options="url: '/businessunit/loadContents',method:'get',rownumbers: true,
           idField:'key',treeField:'businessunitname',
           onSelect: buselected,
           onContextMenu: onContextMenu">
        <thead>
            <tr>
                <th data-options="field:'businessunitname'" width="70%">Unit name</th>
                <th data-options="field:'businessunitstatus'" width="30%">Unit status</th>
                
            </tr>
        </thead>
        
    </table>
    </div>
    <div style="width: 40% !important; float: right !important; margin-left: 0px;">
    <table id="bupdg" 
           >
        
        
    </table>
        </div>
    <div id="nptb" style="padding: 2px 5px; display: none;">
        <a href="#" onclick="addposition()" class="easyui-linkbutton" iconCls="icon-add" plain="true">Add position</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true">Edit position</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true">Remove position</a>
    </div>
    <div id="mm" class="easyui-menu" style="width:120px;">
        <div onclick="addunit()" data-options="iconCls:'icon-add'">Add sub-department</div>
        <div onclick="editunit()" data-options="iconCls:'icon-edit'">Edit</div>
        <div onclick="removeunit()" data-options="iconCls:'icon-remove'">Remove</div>
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