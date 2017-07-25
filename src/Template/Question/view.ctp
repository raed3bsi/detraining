<div style="width: 100%;">
    <?= $this->element('question/'.$question->questiontype->viewelement, [
        'question' => $question,
        'qoptions' => $qoptions
    ]) ?>
</div>
