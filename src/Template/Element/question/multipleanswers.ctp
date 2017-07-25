    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Choices</th>
                <th>Correct</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0;$i<count($question->subquestions);$i++): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $this->Form->input('subquestions.'.$i.'.questiondescription', ['label' => false,
                    'value' => $question->subquestions[$i]->questiondescription]) ?></td>
                <td><?= 
                    $this->Form->input('subquestions.'.$i.'.correctanswers.0.answerdescription', [
                        'type' => 'checkbox', 
                        'class' => 'canswer'
                        , 'required' => false, 'label' => false,
                        'checked' => $question->subquestions[$i]->correctanswers[0]->answerdescription==1? true:false
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
                <td><?= $this->Form->input('subquestions.'.$i.'.points', [
                    'label' => FALSE,
                    'value' => $question->subquestions[$i]->points
                ]) ?></td>
                
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>

