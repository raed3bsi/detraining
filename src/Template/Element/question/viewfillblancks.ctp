<script type="text/javascript">
    function filldata(){
        return $("#qansform").serialize();
    }
</script>
<div>
    <?= $question->questiondescription ?>
</div>

<form id="qansform" method="post" target="/question/questionanswer/<?= $question->questionid ?>"
      >
    <?php $i=0;?>
    <?php foreach ($question->subquestions as $subq):?>
    <?= $this->Form->input('subquestions.'.$i++.'.questionanswer.0.description', [
        'label' => $subq->questiondescription]);
        ?>
    <?php        endforeach;?>
</form>

