<script type="text/javascript">
    function editslevel(){
        var node = $('#sleveldg').datagrid('getSelected');
            if (node){
                
                var url= "/specializationlevel/edit/"+node.slevelid;
                openwindow(url);
                //$('#tg').treegrid('remove', node.id);
            }
    }
    
    function removeslevel(){
        var node = $('#sleveldg').datagrid('getSelected');
        if(node){
            $("#confirmdialog").children("p").replaceWith($("#cdpattern").html()
                    .replace("%t",node.levelname));
            var url="/specializationlevel/delete/"+node.slevelid;
            removeconfirmdialog("confirmdialog",url,"sleveldg");
        }
        else{
            alert("Please, select an item to remove");
        }
    }
    
    
</script>

<div >
    <h3><?= h($specialization->specializationname) ?></h3>
    <table id="sleveldg" class="easyui-datagrid" title="<?= __('Levels') ?>"
           data-options="url:'/specializationlevel/loadContents/<?= $specialization->specializationid ?>',
           method:'get',singleSelect:true,collapsible:true,
           toolbar:'#sleveltb'">
        <thead>
            <tr>
                <th data-options="field: 'levelno'">Level number</th>
                <th data-options="field: 'levelname'">Level name</th>
                
            </tr>
        </thead>
    </table>
    <div id="sleveltb" style="padding: 2px 5px;">
        <a href="#" class="easyui-linkbutton" 
           onclick="openwindow('/specializationlevel/add/<?= $specialization->specializationid ?>')" 
           iconCls="icon-add" plain="true"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
           onclick="editslevel()"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
           onclick="removeslevel()"> </a>
        
        
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

