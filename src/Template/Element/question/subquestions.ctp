    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <?php if($confs['subqtitle']!=null):?>
                <th><?= $confs['subqtitle'] ?></th>
                <?php endif;?>
                
                <th><?= $confs['answerlabel'] ?></th>
                <?php if($confs['pbysub']==TRUE):?>
                <th>Points</th>
                <?php endif;?>
                
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0;$i<count($subquestions);$i++): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <?php if($confs['subqtitle']!=null):?>
                <td><?= $this->Form->input('subquestions.'.$i.'.questiondescription', ['label' => false,
                    'value' => $subquestions[$i]->questiondescription]) ?></td>
                <?php endif;?>
                <td><?= $this->element('question/correctanswer', [
            'prefix' => 'subquestions.'.$i.'.',
            'answertype' => $confs['answertype'],
            'answers' => $subquestions[$i]->correctanswers,
            'answerlabel' => ''
        ]); ?>
                <?php if($confs['answertype']=='radiogroup'):?>
                    <input type="radio" name="selectedsubq" value="<?= $i ?>" 
                        <?= $subquestions[$i]->correctanswers[0]=='1'?'checked':'' ?>/>
                    <?php endif;?>
                </td>
                <?php if($confs['pbysub']==TRUE):?>
                <td><?= $this->Form->input('subquestions.'.$i.'.points', [
                    'label' => FALSE,
                    'value' => $subquestions[$i]->points
                ]) ?></td>
                <?php endif;?>
                
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>
