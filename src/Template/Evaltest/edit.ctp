<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $evaltest->testid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $evaltest->testid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Evaltest'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="evaltest form large-9 medium-8 columns content">
    <?= $this->Form->create($evaltest) ?>
    <fieldset>
        <legend><?= __('Edit Evaltest') ?></legend>
        <?php
            echo $this->Form->input('testduration');
            echo $this->Form->input('durationunitfactor');
            echo $this->Form->input('tcategoryid');
            echo $this->Form->input('testtitle');
            echo $this->Form->input('testdescription');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
