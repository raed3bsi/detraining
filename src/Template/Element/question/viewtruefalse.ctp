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
    <?= $this->Form->input('questionanswer.0.answerid', ['type' => 'hidden',
        'value' => $question->questionanswer[0]->answerid])
        ?>
    <?= $this->Form->input('questionanswer.0.description', ['type' => 'radio',
        'label' => false,
        'options' => [['value' => 'false', 'text' => 'False'],
        ['value' => 'true', 'text' => 'True']]]);
        ?>
</form>
