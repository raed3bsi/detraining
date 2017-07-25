<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $abstractjob->jobid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $abstractjob->jobid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Abstractjob'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="abstractjob form large-9 medium-8 columns content">
    <?= $this->Form->create($abstractjob) ?>
    <fieldset>
        <legend><?= __('Edit Abstractjob') ?></legend>
        <?php
            echo $this->Form->input('jobname');
            echo $this->Form->input('jobtooltip');
            echo $this->Form->input('sgroupid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
