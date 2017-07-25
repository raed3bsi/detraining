
<script type="text/javascript">
    $(function(){
        $(".input-inline").parent('div').css("display","table-cell");
            $(".input-inline").parent('div').css("max-height","40px");
        $('td:nth-child(4),th:nth-child(4)').hide();
        $("#pfactor").change(function(e){
            if(this.value==1){
                $('td:nth-child(4),th:nth-child(4)').hide();
                $("#qpoints").parent('div').show();
                $("#qnpoints").parent('div').show();
            }else{
                $('td:nth-child(4),th:nth-child(4)').show();
                $("#qpoints").parent('div').hide();
                $("#qnpoints").parent('div').hide();
            }
        });
    });
    function submitform(){
        if($("#qtid").length>0){
            $("#qtid").val($("#qtcc").combotree('getValue'));
        //    alert($("#qtid").val());
        }
        
        var data=$("#aqform");
        
        $("#w").window('close');
            var posting=$.post($("#aqform").attr('action'),$(data).serialize() );
            posting.done(function(data){
          //      alert("question saved: "+data);
                $("#tqs").datagrid('reload');
                
                //$("#tid").val(data);
                //alert("testid:"+$("#tid").val());
            });
    }
    function cancelform(){
        $("#w").window('close');
    }
</script>


<div class="question form large-9 medium-8 columns content">
    <?= $this->Form->create($question,['id' => 'aqform']) ?>
    <fieldset>
        <legend><?= __('Add Question') ?></legend>
        <?php
            echo $this->Form->input('difficultyid',['options' => $qdiffs, 'class' => 'input-inline']);
            echo $this->Form->input('points',['class' => 'input-inline',
                'id' => 'qpoints']);
            echo $this->Form->input('negativepoints',['class' => 'input-inline',
                'id' => 'qnpoints']);
            if($confs['pbysub']==1){
                $pfactors=['1' => 'By question', '0' => 'By answer'];
                echo $this->Form->input('pointsfactor',['class' => 'input-inline',
                    'label' => ['text' => 'Score'], 'options' => $pfactors
                        , 'id' => 'pfactor']);
            }
            echo $this->Form->input('questiondescription',['type' => 'textarea']);
            if($topic!=NULL){
                echo $this->Form->input('topicid',['id' => 'qtid', 'type' => 'hidden']);
                echo "<input id='qtcc' class='easyui-combotree' data-options=\"url:'/coursetopic/questiontopics/".$topic->topicid.
                        "',method:'get',label:'Topics:',labelPosition:'top'\" style=\"width:100%\">";
            }
            
        ?>
        <?=
            $this->element('/question/'.$question->questiontype->editelement, [
                'question' => $question
            ]);
            ?>
        
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="submitform()">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelform()">Cancel</a>
    <?= $this->Form->end() ?>
</div>
