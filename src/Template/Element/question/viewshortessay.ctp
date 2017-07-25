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
    <?= $this->Form->input('questionanswer.0.description');
        ?>
    <?= $this->Form->input('questionanswer.0.answerid');
        ?>
</form>

