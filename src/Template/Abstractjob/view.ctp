<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Abstractjob'), ['action' => 'edit', $abstractjob->jobid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Abstractjob'), ['action' => 'delete', $abstractjob->jobid], ['confirm' => __('Are you sure you want to delete # {0}?', $abstractjob->jobid)]) ?> </li>
        <li><?= $this->Html->link(__('List Abstractjob'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Abstractjob'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="abstractjob view large-9 medium-8 columns content">
    <h3><?= h($abstractjob->jobid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Jobname') ?></th>
            <td><?= h($abstractjob->jobname) ?></td>
        </tr>
        <tr>
            <th><?= __('Jobtooltip') ?></th>
            <td><?= h($abstractjob->jobtooltip) ?></td>
        </tr>
        <tr>
            <th><?= __('Jobid') ?></th>
            <td><?= $this->Number->format($abstractjob->jobid) ?></td>
        </tr>
        <tr>
            <th><?= __('Sgroupid') ?></th>
            <td><?= $this->Number->format($abstractjob->sgroupid) ?></td>
        </tr>
    </table>
</div>
