<script type="text/javascript">
    function filldata(){
        return $("#qansform").serialize();
    }
</script>
<div>
    <?= $question->questiondescription ?>
</div>
<form id="qansform" method="post" target="/question/questionanswer/<?= $question->questionid ?>">
<?php for ($i=0;$i<count($question->subqestions);$i++):?>
    <?=
    $this->Form->input('subquestions.'.$i.'.'.'questionanswer.0.description', [
        'type' => 'checkbox',
        'required' => false,
        'value' => '1',
        'label' => $question->subquestions[$i]->questiondescription
    ]);
    ?>
    <?=
    $this->Form->input('subquestions.'.$i.'.'.'questionanswer.0.answerid', [
        'type' => 'hidden',
        'value' => $question->subquestions[$i]->questionanswer[0]->answerid
    ])
    ?>
    <?=
    $this->Form->input('subquestions.'.$i.'.'.'questionid', [
        'type' => 'hidden',
        'value' => $question->subquestions[$i]->questionid
    ])
    ?>

<?php endfor; ?>

</form>
