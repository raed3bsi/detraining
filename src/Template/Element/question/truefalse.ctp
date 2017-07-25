<?php

$input_ops=[
    'type' => 'radio', 
    'class' => 'canswer'
        , 'required' => false, 'label' => 'Correct answer',
    'options' => [['value' => 'false', 'text' => 'False'],
        ['value' => 'true', 'text' => 'True']],
    'value' => $question->correctanswers[0]->answerdescription
];
echo $this->Form->input('correctanswers.0.answerdescription', $input_ops);
echo $this->Form->input('correctanswers.0.id', ['type' => 'hidden', 'value' => 
    $question->correctanswers[0]->id]);