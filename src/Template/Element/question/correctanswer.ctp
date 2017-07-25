<?php 
if($answertype=='radiogroup'){
    return;
}
if(count($answers)>0){
    echo $answerlabel;
}
$input_ops=[
    'type' => $answertype, 
    'class' => 'canswer'
        , 'required' => false, 'label' => false
];
if($answertype=='radio'){
    $input_ops['options']=[['value' => 'false', 'text' => 'False'],
        ['value' => 'true', 'text' => 'True']];
}
if($answertype=='checkbox'){
    $input_ops['value']='1';
}
for ($i=0;$i<  count($answers);$i++) :?>
<?= $this->Form->input($prefix.'correctanswers.'.$i.'.answerdescription', $input_ops);
    ?>
<?php endfor;?>


