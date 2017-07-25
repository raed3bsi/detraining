<script type="text/javascript">
    function displayanspanel(sqindex){
        
    }
</script>

        <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Blank</th>
                <th>Acceptable answers</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0;$i<count($question->subquestions);$i++): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $this->Form->input('subquestions.'.$i.'.questiondescription', ['label' => false,
                    'value' => $question->subquestions[$i]->questiondescription]) ?></td>
                <td>
                    
                    <?= $this->Form->input('subquestions.'.$i.'.questionid', [
                    'type' => 'hidden',
                    'value' => $question->subquestions[$i]->questionid
                ]) ?>
                    <div class="easyui-panel" title="Correct answers" style="width:200px;"
                         data-options="collapsible:true, collapsed: true">
                        <?php for ($j=0;$j<count($question->subquestions[$i]->correctanswers);$j++): ?>
                        
                            <?= 
                    $this->Form->input('subquestions.'.$i.'.correctanswers.'.$j.'.answerdescription', [
                        'type' => 'text'
                        , 'required' => false, 'label' => false,
                        'value' => $question->subquestions[$i]->correctanswers[$j]->answerdescription
                    ]);
            ?>
                        <?= $this->Form->input('subquestions.'.$i.'.correctanswers.'.$j.'.id', [
                    'type' => 'hidden',
                    'value' => $question->subquestions[$i]->correctanswers[$j]->id
                ]) ?>
                        
                        <?php                         endfor;?>
                    </div>
                    
                
                </td>
                <td><?= $this->Form->input('subquestions.'.$i.'.points', [
                    'label' => FALSE,
                    'value' => $question->subquestions[$i]->points
                ]) ?></td>
                
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>


