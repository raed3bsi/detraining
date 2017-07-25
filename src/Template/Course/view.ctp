<script type="text/javascript">
    function editversion(){
        var node=$("#cversiondg").datagrid("getSelected");
        if(node){
            var url='/courseversion/edit/'+node.versionid;
            openwindow(url);
        }//else alert
    }
    
    function removeversion(){
        var total=$("#cversiondg").datagrid("getData").total;
        if(total===1){
            alert("A course should has at least one version");
            return;
        }
        var node=$("#cversiondg").datagrid("getSelected");
        if(node){
            $("#confirmdialog").children("p").replaceWith($("#cdpattern").html()
                    .replace("%t",node.versionname));
            var url="/courseversion/delete/"+node.versionid;
            removeconfirmdialog("confirmdialog",url,"cversiondg");
            
        }//else alertd
    }
    
    function viewtopics(){
        var node=$("#cversiondg").datagrid("getSelected");
        if(node){
            var url='/coursetopic/index/'+node.versionid;
            window.location.href=url;
        }//else alert
    }
</script>
<div class="easyui-layout" data-options="fit:true">
    <div data-options="region: 'west'" style="width: 300px;">
    <h3><?= __('Course info') ?></h3>
    <table id="cdpg" class="easyui-propertygrid" data-options="showHeader: false, 
           url: '/course/loadProperty',
           method: 'get'" style="width: 280px; margin-left: 10px !important;">
        
    </table>
    <div class="related">
        <h4><?= __('Related Fields') ?></h4>
        <?php if (!empty($course->fieldofstudy)): ?>
        <table cellpadding="0" cellspacing="0">
            
            <?php foreach ($course->fieldofstudy as $fieldofstudy): ?>
            <tr>
                <td><?= h($fieldofstudy->fieldofstudyname) ?></td>
                
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
    
    <div data-options="region: 'center'">
        <table id="cversiondg" class="easyui-datagrid" cellpadding="0" cellspacing="0" title="<?= __('Course versions') ?>"
           data-options="singleSelect:true,collapsible:true,url:'/courseversion/loadContents',method:'get',
           toolbar:'#cversiontb'">
        <thead>
            <tr>
                <th data-options="field: 'versionname'">Version name</th>
                <th data-options="field: 'coursedescription'">Course description</th>
                <th data-options="field: 'courseobjectives'">Course objectives</th>
                <th data-options="field: 'coursegoals'">Course goals</th>
                <th data-options="field: 'traininghours'">Training hours</th>
                <th data-options="field: 'versionseq'">Version number</th>
                
                
            </tr>
        </thead>
        
    </table>
    <div id="cversiontb" style="padding: 2px 5px;">
        <a href="#" class="easyui-linkbutton" 
           onclick="openwindow('/courseversion/add')" 
           iconCls="icon-add" plain="true"><?= __('Add version') ?></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
           onclick="editversion()"><?= __('Edit version') ?></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
           onclick="removeversion()"> <?= __('Remove version') ?></a>
        <a href="#" class="easyui-linkbutton" plain="true"
           onclick="viewtopics()"> <?= __('View topics') ?></a>
        
    </div>
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