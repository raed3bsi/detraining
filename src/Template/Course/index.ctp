<script type="text/javascript">
    function editcourse(){
        var node = $('#coursedg').datagrid('getSelected');
            if (node){
                
                var url= "/course/edit/"+node.courseid;
                openwindow(url);
                //$('#tg').treegrid('remove', node.id);
            }
    }
    
    function removecourse(){
        var node = $('#coursedg').datagrid('getSelected');
        if(node){
            $("#confirmdialog").children("p").replaceWith($("#cdpattern").html()
                    .replace("%t",node.coursename));
            var url="/course/delete/"+node.courseid;
            removeconfirmdialog("confirmdialog",url,"coursedg");
        }
        else{
            alert("Please, select an item to remove");
        }
    }
    
    function viewcourse(){
        var node = $('#coursedg').datagrid('getSelected');
        if(node){
            var url="/course/view/"+node.courseid;
            window.location.href=url;
        }
        else{
            alert("Please, select an item to view");
        }
    }
</script>
<div >
    <table id="coursedg" class="easyui-datagrid" cellpadding="0" cellspacing="0" title="<?= __('Course') ?>"
           data-options="singleSelect:true,collapsible:true,url:'/course/loadContents',method:'get',
           toolbar:'#tporgtb'">
        <thead>
            <tr>
                <th data-options="field: 'coursenumber'">Course number</th>
                <th data-options="field: 'coursename'">Course name</th>
                <th data-options="field: 'categoryname'">Category</th>
                <th data-options="field: 'coursestatus'">Status</th>
                <th data-options="field: 'lastversion'">Last version</th>
                <th data-options="field: 'createdon'">Created on</th>
                <th data-options="field: 'ownername'">Created by</th>
                
            </tr>
        </thead>
        
    </table>
    <div id="tporgtb" style="padding: 2px 5px;">
        <a href="#" class="easyui-linkbutton" 
           onclick="openwindow('/course/add')" 
           iconCls="icon-add" plain="true"><?= __('Add course') ?></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
           onclick="editcourse()"><?= __('Edit course') ?></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
           onclick="removecourse()"> <?= __('Remove course') ?></a>
        <a href="#" class="easyui-linkbutton" plain="true"
           onclick="viewcourse()"> <?= __('View details') ?></a>
        
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