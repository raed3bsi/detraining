<style type="text/css">
     .over{
            background:#FBEC88;
        }
        .assigned{
            border:1px solid #BC2A4D;
        }
        
        .matched{
            
            float: right;
        }
        
        li {margin: 5px; padding: 5px;   min-width: 150px;  }
        li span{padding: 5px;}
        li div{padding: 5px;}
</style>
<script type="text/javascript">
    var iswidthadjusted=false;
    $(function(){
        
       $(".mqodrag").draggable({
           revert: true
           
       });
       $(".msqdrop").droppable({
           accept: '.mqodrag',
           onDragEnter:function(){
                    $(this).addClass('over');
                },
                onDragLeave:function(){
                    $(this).removeClass('over');
                },
                onDrop: matchitem
       });
       $("#allopsdrop").droppable({
           accept: '.matched',
           onDrop: revertitem
       });
    });
    function matchitem(event,ui){
        var newmatch=$(ui).find('div').text();
        var oldmatch=$(this).find("input").val();
        $(this).find("input").val(newmatch);
        $(this).removeClass('over');
        if(oldmatch!==""){
            $(ui).find('div').text(oldmatch);
            $(this).find("div").text(newmatch);
            event.preventDefault();
            return;
        }
        
        
        //$(this).parent('li').removeClass('ui-state-default');
        $(this).parent('li').addClass('ui-state-highlight');
        if(!iswidthadjusted){
            var neww=$(this).width()+$(ui).find('div').width();
            $(this).width(neww);
            iswidthadjusted=true;
        }
        var c=$(ui).find('div');
        $(this).append(c);
        $(this).find('div').addClass('matched');
        c.draggable({
            revert: true
        });
        $(ui).remove();
        //$(ui).addClass('assigned');
    }
    
    function revertitem(event,ui){
        $(ui).parent('div').find("input").val("");
        $(ui).removeClass('matched');
        alert($(ui).parent('div').text());
        $(ui).parent('div').parent('li').removeClass('ui-state-highlight');
        $(this).append('<li class="ui-state-default mqodrag">'+$(ui).text()+'</li>');
        $(ui).remove();
        //$(this).remove("div");
        //$(this).append(ui);
    }
    
    function filldata(){
        return $("#qansform").serialize();
    }
</script>

<div>
    <?= $question->questiondescription ?>
</div>
<?php
$qoptions=array();
foreach ($question->subquestions as $subq){
    array_push($qoptions, $subq->correctanswers[0]->answerdescription);
}
foreach ($question->questionoptions as $qops){
    array_push($qoptions, $qops->optiondescription);
}
shuffle($qoptions);
$i=0;
?>
<form id="qansform" method="post" target="/question/questionanswer/<?= $question->questionid ?>"
      >
    <div style="width: 100%;">
    <ul style="width: fit-content; list-style-type: none; max-width: 50%;float: left; padding-right: 5%;">
<?php foreach ($question->subquestions as $subqs):?>
        <li class=" ui-state-default">
            <span><?= $subqs->questiondescription ?></span>
            <div class="msqdrop">
    
        <?=
        $this->Form->input('subquestions.'.$i++.'questionanswer.0.description', [
            'type' => 'hidden'
        ])
        ?>
        <?=
        $this->Form->input('subquestions.'.$i++.'questionid', [
            'type' => 'hidden', 'value' => $subqs->questionid
        ])
        ?>        
        <?=
        $this->Form->input('subquestions.'.$i++.'questionanswer.0.answerid', [
            'type' => 'hidden', 'value' => $subqs->questionanswer[0]->answerid
        ]);
        ?>
        
                </div>
    
</li>
    
<?php endforeach; ?>
    </ul>
    <ul id="allopsdrop" style="width: fit-content; list-style-type: none; max-width: 50%;float: left;
        padding-left: 5%;">
<?php foreach ($qoptions as $mqops):?>
        <li class="ui-state-default mqodrag">
            <div><?= $mqops ?></div>
</li>
<?php endforeach; ?>
    </ul>
    </div>
    
</form>


