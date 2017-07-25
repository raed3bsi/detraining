<style type="text/css">
    #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #sortable li { margin: 0 3px 3px 3px; padding: 0em; padding-left: 1.5em; font-size: 1em; height: 30px; }
</style>
<script type="text/javascript">
    $( function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
      } );
      function filldata(){
          var sorteditems=$("#sortable").sortable("toArray", {attribute: "itemval"});
          for(var i=0;i<sorteditems.length;i++){
              $("#subqans"+i).val(sorteditems[i]);
          }
          return $("#qansform").serialize();
      }
</script>
<?php

$initseq=array();
?>
<div>
    <h3>
    <?= $question->questiondescription ?>
        </h3>
</div>

<form id="qansform" method="post" target="/question/questionanswer/<?= $question->questionid ?>"
      >
    <?php for($i=0;$i<count($question->subquestions);$i++):?>
<?php
    $qansdesc=$question->subquestions[$i]->questionanswer[0]->description;
    if($qansdesc==NULL || $qansdesc==''){
        $qansdesc=$qoptions[$i];
    }
    array_push($initseq, $qansdesc);
    
?>
  <?= $this->Form->input('subquestions.'.$i.'questionanswer.0.description', [
            'type' => 'hidden','id' => 'subqans'.$i, 'value' => $qansdesc
        ]) ?>
<?= $this->Form->input('subquestions.'.$i.'questionanswer.0.answerid', [
            'type' => 'hidden', 'value' => $question->subquestions[$i]->questionanswer[0]->answerid
        ]) ?>
    <?= $this->Form->input('subquestions.'.$i.'questionid', [
            'type' => 'hidden', 'value' => $question->subquestions[$i]->questionid
        ]) ?>
<?php endfor;?>
</form>
<ul id="sortable">
    <?php foreach ($initseq as $seqitem):?>
    <li itemval="<?= $seqitem ?>" class="ui-state-default"><?= $seqitem ?></li>
  <?php endforeach;?>

</ul>
