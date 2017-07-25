<script type="text/javascript">
    $(function(){
        $(".sqseq").change(function (event){
            var seq=$(this).attr('sequence');
            var newval=$(this).val();
            if(newval.length>0){
                $("#subq"+seq).val(seq);
            }else{
                $("#subq"+seq).val('');
            }
            //console.info($("#subq"+seq).val());
            //console.info(seq);
            //console.info(newval);
        });
    });
    function qanswerchanged(){
        
    }
</script>
<table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Correct order</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0;$i<count($question->subquestions);$i++): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <?= $this->Form->input('subquestions.'.$i.'.questiondescription', ['label' => false,
                    'id' => 'subq'.$i, 'type' => 'hidden']) ?>
                <td><?= 
                    $this->Form->input('subquestions.'.$i.'.correctanswers.0.answerdescription', [
                        'type' => 'text', 
                        'class' => 'canswer sqseq',
                        'sequence' => $i
                        , 'required' => false, 'label' => false,
                        'value' => $question->subquestions[$i]->correctanswers[0]->answerdescription
                    ]);
            ?>
                    <?= $this->Form->input('subquestions.'.$i.'.correctanswers.0.id', [
                    'type' => 'hidden',
                    'value' => $question->subquestions[$i]->correctanswers[0]->id
                ]) ?>
                    <?= $this->Form->input('subquestions.'.$i.'.questionid', [
                    'type' => 'hidden',
                    'value' => $question->subquestions[$i]->questionid
                ]) ?>
                
                </td>
                
                
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>




