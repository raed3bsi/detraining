<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Abstractjob'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="abstractjob index large-9 medium-8 columns content">
    <h3><?= __('Abstractjob') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('jobid') ?></th>
                <th><?= $this->Paginator->sort('jobname') ?></th>
                <th><?= $this->Paginator->sort('jobtooltip') ?></th>
                <th><?= $this->Paginator->sort('sgroupid') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($abstractjob as $abstractjob): ?>
            <tr>
                <td><?= $this->Number->format($abstractjob->jobid) ?></td>
                <td><?= h($abstractjob->jobname) ?></td>
                <td><?= h($abstractjob->jobtooltip) ?></td>
                <td><?= $this->Number->format($abstractjob->sgroupid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $abstractjob->jobid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $abstractjob->jobid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $abstractjob->jobid], ['confirm' => __('Are you sure you want to delete # {0}?', $abstractjob->jobid)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
