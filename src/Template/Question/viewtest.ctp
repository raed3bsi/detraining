<script type="text/javascript">
    function onchangepage(pageNumber, pageSize){
        var qid=$("#rootqid").val();
        var data=filldata();
        alert("question id:"+qid);
        alert("data: "+data);
        $.post('/savequestionanswer/'+qid,data)
                .done(function(data){
                    var pnum=pageNumber+1;
                    $("#w").window('refresh','/question/viewtest/'+<?= $qtestid ?>+'?page='+pageNumber);
                    //window.location.href=window.location.href+'?page='+pageNumber;
        });
    }
</script>
<div class="easyui-panel">
    <div class="easyui-pagination" data-options="total:<?= $this->Paginator->counter('{{pages}}') ?>,
         pageSize: 1, pageNumber: <?= $this->Paginator->counter('{{page}}') ?>,showPageList: false,
                    showRefresh: false,
                    displayMsg: '', onSelectPage:onchangepage "></div>
</div>
<?php foreach ($questions as $question):?>
<div style="width: 100%;">
    <input type="hidden" id="rootqid" value="<?= $question->questionid ?>"/>
    <?= $this->element('question/'.$question->questiontype->viewelement, [
        'question' => $question
    ]) ?>
</div>
<?php endforeach; ?>

