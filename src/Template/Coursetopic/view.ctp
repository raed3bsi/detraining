<script type="text/javascript">
    function viewmaterial(){
        var node=$("#cmatdg").datagrid("getSelected");
        if(node){
            var url='/coursematerial/view/'+node.materialid;
            $("#w").window('open');
            $("#w").window('refresh',url);
        }
    }
    
    function removematerial(){
        var node=$("#cmatdg").datagrid("getSelected");
        if(node){
            $("#confirmdialog").children("p").replaceWith($("#cdpattern").html().replace("%t",node.materialname));
            var url='/coursematerial/delete/'+node.materialid;
            removeconfirmdialog("confirmdialog",url,"cmatdg");
        }
    }
    
    function edittest(){
        var node=$("#etestdg").datagrid("getSelected");
        if(node){
            var url='/evaltest/add/'+node.testid+'/edit';
            window.location.href=url;
        }
    }
    
    function removetest(){
        var node=$("#etestdg").datagrid("getSelected");
        if(node){
            $("#confirmdialog").children("p").replaceWith($("#cdpattern").html().replace("%t",
            node.categoryname+" "+node.testtitle));
            var url='/evaltest/delete/'+node.testid;
            removeconfirmdialog("confirmdialog",url,"etestdg");
        }
        
    }
</script>
<h3><?= h($coursetopic->topictitle) ?></h3>
<div class="easyui-tabs" style="width:100%;height:90%;">
    <div title="Topic info">
    
    <table class="vertical-table">
        <tr>
            <th><?= __('Topictitle') ?></th>
            <td><?= h($coursetopic->topictitle) ?></td>
        </tr>
        <tr>
            <th><?= __('Topicid') ?></th>
            <td><?= $this->Number->format($coursetopic->topicid) ?></td>
        </tr>
        
        
        <tr>
            <th><?= __('Traininghours') ?></th>
            <td><?= $this->Number->format($coursetopic->traininghours) ?></td>
        </tr>
        
    </table>
    <div class="row">
        <h4><?= __('Topicdescription') ?></h4>
        <?= $this->Text->autoParagraph(h($coursetopic->topicdescription)); ?>
    </div>
    </div>
    
    <div title="Topic materials">
        <table id="cmatdg" class="easyui-datagrid" cellpadding="0" cellspacing="0" title="<?= __('Materials') ?>"
           data-options="singleSelect:true,collapsible:true,
           url:'/coursematerial/loadContents',method:'get',
           toolbar:'#cmattb'">
        <thead>
            <tr>
                <th data-options="field: 'materialname'">Course number</th>
                
                
            </tr>
        </thead>
        
    </table>
    <div id="cmattb" style="padding: 2px 5px;">
        <a href="#" class="easyui-linkbutton" 
           onclick="openwindow('/coursematerial/add')" 
           iconCls="icon-add" plain="true"><?= __('Add') ?></a>
        
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
           onclick="removematerial()"> <?= __('Remove') ?></a>
        <a href="#" class="easyui-linkbutton" plain="true"
           onclick="viewmaterial()"> <?= __('View') ?></a>
        
    </div>
    
    </div>
    <div title="Quizzes and Assignments">
        <table id="etestdg" class="easyui-datagrid" cellpadding="0" cellspacing="0" title="<?= __('Evaluation tests') ?>"
           data-options="singleSelect:true,collapsible:true,
           url:'/evaltest/loadContents',method:'get',
           toolbar:'#etesttb'">
        <thead>
            <tr>
                <th data-options="field: 'testtitle'">Test title</th>
                <th data-options="field: 'categoryname'">Test type</th>
                <th data-options="field: 'testduration'">Test duration</th>
                
                
            </tr>
        </thead>
        
    </table>
        <div id="etesttb" style="padding: 2px 5px;">
        <a href="#" class="easyui-menubutton" 
           data-options="menu: '#mm1'" 
           iconCls="icon-add" plain="true"><?= __('Add') ?></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
           onclick="edittest()"> <?= __('Edit') ?></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
           onclick="removetest()"> <?= __('Remove') ?></a>
        <a href="#" class="easyui-linkbutton" plain="true"
           onclick="viewtest()"> <?= __('View') ?></a>
        
    </div>
        <div id="mm1" style="width:150px;">
        <?php foreach ($testcats as $tcat):?>
        <div>
            <?= $this->Html->link(__($tcat->tcategoryname), 
                    ['controller' => 'evaltest','action' => 'add',$tcat->tcategoryid,'add']) ?></div>
        <?php endforeach;?>
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