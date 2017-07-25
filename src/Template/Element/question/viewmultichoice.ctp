<script type="text/javascript">
    function filldata(){
        var selectedqid=$("input:radio[name='selectedsubq[]']").val();
        $(".sqansdesc").each(function(index){
            if($(this).attr("sqid")===selectedqid){
                $(this).val("1");
            }else{
                $(this).val("0");
            }
        });
        return $("#qansform").serialize();
    }
</script>
<div>
    <?= $question->questiondescription ?>
</div>
<form id="qansform" method="post" target="/question/questionanswer/<?= $question->questionid ?>">
    <?php $i=0;?>
<?php foreach ($question->subquestions as $subq):?>
<input type="radio" name="selectedsubq[]" value="<?= $subq->questionid ?>"
       <?= $subq->questionanswer[0]->description=='1'?'checked':'' ?>/><?= $subq->questiondescription ?><br />
       <?= $this->Form->input('subquestions.'.$i++.'.'.'questionanswer.0.description', ['type' => 'hidden', 
           'value' => $subq->questionanswer[0]->description, 'class' => 'sqansdesc',
           'sqid' => $subq->questionid]);
        ?>
        <?= $this->Form->input('subquestions.'.$i++.'.'.'questionanswer.0.answerid', ['type' => 'hidden', 
            'value' => $subq->questionanswer[0]->answerid]);
        ?>
        <?= $this->Form->input('subquestions.'.$i++.'.'.'questionid', ['type' => 'hidden', 
            'value' => $subq->questionid]);
        ?>
<?php endforeach; ?>

</form>
