<script type="text/javascript">
    $(function(){
        $("#duration, #title, #desc").textbox({
            onChange: 
                    function(newValue,oldValue){
            if(newValue==oldValue){
                return;
            }
            var data=$(this.form);
            var posting=$.post($(this.form).attr('action'),$(data).serialize() );
            posting.done(function(data){
                //alert("test saved: "+data);
                if(!isNaN(data) && data!==''){
                    console.info('post changing action...');
                    $("#tid").val(data);
                    $("#etestform").attr('action','/detraining/evaltest/add/'+data+'/edit');
                }
                
                
                console.info("testid:"+$("#tid").val());
            })
                    }
            
                    
        });
        
        
        
    });
    
    function editquestion(){
        var node=$("#tqs").datagrid("getSelected");
        if(node){
            var url='/detraining/question/add/'+node.questionid+'/edit';
            $("#w").window('open');
            $("#w").window('refresh',url);
        }
    }
    
    function movequestion(targetRow,sourceRow,point){
        var url='/detraining/question/movequestion/'+targetRow.questionid+'/'+sourceRow.questionid+'/'+point;
        $.ajax({
               url: url,
               success: function (data, textStatus, jqXHR) {
                       }
            });
    }
    //$("#tgs").datagrid('reload');
    
    function removequestion(){
        var node=$("#tqs").datagrid("getSelected");
        if(node){
            $("#rqswitch").switchbutton('reset');
            $("#confirmdialog").children("p").replaceWith($("#cdpattern").html().replace("%t",
            node.typename+" "+node.questiondescription.substring(0,60)+"..."));
            var url='/detraining/question/delete/'+node.questionid;
            removeconfirmdialog("confirmdialog",url,"tqs",["rqparam"]);
        }
        
    }
    
    function rqparamchanged(checked){
        console.log(checked);
        if(checked==true){
            $("#rqparam").val(1);
        }else{
            $("#rqparam").val(0);
        }
    }
    
    function previewquestion(){
        var node=$("#tqs").datagrid("getSelected");
        if(node){
            var url='/detraining/question/view/'+node.questionid;
            $("#w").window('open');
            $("#w").window('refresh',url);
        }
    }
</script>


<div class="evaltest form large-6 medium-8 columns content">
    <div class="easyui-panel" title="New <?= $evaltest->testcategory->tcategoryname ?>" style="width:100%;padding:30px 60px;">
    <?= $this->Form->create($evaltest,['id' => 'etestform']) ?>
    
        <?php
            echo $this->Form->input('testid', ['id' => 'tid', 'type' => 'hidden', 'value' => $evaltest->testid]);
            echo $this->Form->input('tcategoryid',['type' => 'hidden']);
            echo $this->Form->input('durationunitfactor',['type' => 'hidden']);
            echo $this->Form->input('testduration',['class' => 'easyui-textbox','data-options' => "label:'Test duration:'",
                            'label' => FALSE, 'style' => 'width: 100%;', 'id' => 'duration']);
            echo $this->Form->input('testtitle',['class' => 'easyui-textbox',
                'label' => FALSE,  'style' => 'width: 100%;','data-options' => "label:'Test title:'", 'id' => 'title']);
            echo $this->Form->input('testdescription',['class' => 'easyui-textbox', 'multiline' => 'true',
                'label' => FALSE,  'style' => 'width: 100%;height:60px;','data-options' => "label:'Test description:'",
                             'id' => 'desc']);
            echo $this->Form->input('topicid', ['type' => 'hidden', 'value' => $evaltest->topicid]);
            if($evaltest->placementtest!=NULL){
                echo $this->Form->input('placementtest.ptestid', 
                        ['type' => 'hidden', 'value' => $evaltest->placementtest->ptestid]);
                echo $this->Form->input('placementtest.specializationid', 
                        ['type' => 'hidden', 'value' => $evaltest->placementtest->categoryid]);
                echo $this->Form->input('placementtest.ptestnumber', 
                        ['label' => 'Placement test number: ']);
                /*
                echo $this->Form->input('placementtest.service.serviceid', 
                        ['type' => 'hidden', 'value' => $evaltest->placementtest->service->serviceid]);
                echo $this->Form->input('placementtest.service.stypeid', 
                        ['type' => 'hidden', 'value' => $evaltest->placementtest->service->stypeid]);
                echo $this->Form->input('placementtest.service.serviceprice', ['label' => 'Placement test price']);
                echo $this->Form->input('placementtest.service.pricecurrency', ['options' => $currencies]);
                 * 
                 */
            }
        ?>
    
    
    <?= $this->Form->end() ?>
        </div>
</div>

<div>
    <table id="tqs" class="easyui-datagrid" title="Test questions" style="width: 100%; height: 400px;"
        data-options="singleSelect:true,collapsible:true,url:'/detraining/evaltest/testquestions',method:'get',toolbar:'#tqtb',
        onLoadSuccess:function(){
                $(this).datagrid('enableDnd');
            },
            onDrop: movequestion">
        <thead>
            <tr>
                <th data-options="field:'typename',width:120">Type</th>
                <th data-options="field:'questiondescription',width:400">Question</th>
                <th data-options="field:'difficulty',width:120">Difficulty</th>
                <th data-options="field:'points',width:100">Points</th>
                <th data-options="field:'negativepoints',width:120">Negative points</th>
            </tr>
        </thead>
    </table>
    <div id="tqtb" style="padding: 2px 5px;">
        <a href="#" class="easyui-menubutton" iconCls="icon-add" data-options="menu:'#mm1'" plain="true"></a>
        <a href="#" onclick="editquestion()" class="easyui-linkbutton" iconCls="icon-edit" plain="true"></a>
        <a href="#" onclick="removequestion()" class="easyui-linkbutton" iconCls="icon-remove" plain="true"></a>
        <a href="#" onclick="previewquestion()" class="easyui-linkbutton" plain="true">view</a>
    </div>
    <div id="mm1" style="width:150px;">
        <?php foreach ($qtypes as $qt):?>
        <div>
            <?= $this->Html->link(__($qt->qtypename), ['controller' => 'question','action' => 'add',$qt->qtypeid],
                    ['class' => 'easyui-linkbutton wdialog-button']) ?></div>
        <?php endforeach;?>
    </div>
</div>

<div id="confirmdialog" style="display: none;width:400px;height:200px;padding:10px">
    <p>
    
    </p>
    <label>Also remove from questions bank?
        
    </label>
    <input id="rqswitch" class="easyui-switchbutton" data-options="onTest:'Yes',offTest:'No', value:'off',
           onChange: rqparamchanged" />
    <input type="hidden" id="rqparam" value="0"/>
        
        
    
    </div>
<div id="cdpattern" style="display: none;">
    <p>
    <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
        Are you sure you want to remove "%t"?
        </p>
</div>


