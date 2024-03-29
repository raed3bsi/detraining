<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Organizationstructure'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="organizationstructure index large-9 medium-8 columns content">
    <h3><?= __('Organizationstructure') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('structureid') ?></th>
                <th><?= $this->Paginator->sort('structurehint') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($organizationstructure as $organizationstructure): ?>
            <tr>
                <td><?= $this->Number->format($organizationstructure->structureid) ?></td>
                <td><?= h($organizationstructure->structurehint) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $organizationstructure->structureid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $organizationstructure->structureid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $organizationstructure->structureid], ['confirm' => __('Are you sure you want to delete # {0}?', $organizationstructure->structureid)]) ?>
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
