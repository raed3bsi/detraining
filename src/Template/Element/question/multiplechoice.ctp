<script type="text/javascript"    >
    function editrganswer(ansindex){
        $(".rganswer").val("0");
        $("#rgans"+ansindex).val("1");
    }
</script>
<table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Choices</th>
                <th>Correct</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0;$i<count($question->subquestions);$i++): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $this->Form->input('subquestions.'.$i.'.questiondescription', ['label' => false,
                    'value' => $question->subquestions[$i]->questiondescription]) ?></td>
                <td>
                    <input type="radio" name="selectedsubq" onchange="editrganswer(<?= $i ?>)"
                        <?= $question->subquestions[$i]->correctanswers[0]->answerdescription=='1'?'checked':'' ?>/>
                    <?= 
                    $this->Form->input('subquestions.'.$i.'.correctanswers.0.answerdescription', [
                        'type' => 'hidden', 
                        'id' => 'rgans'.$i,
                        'class' => 'rganswer',
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


