<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Educationlevel'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="educationlevel index large-9 medium-8 columns content">
    <h3><?= __('Educationlevel') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('educationlevelid') ?></th>
                <th><?= $this->Paginator->sort('educationlevelname') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($educationlevel as $educationlevel): ?>
            <tr>
                <td><?= $this->Number->format($educationlevel->educationlevelid) ?></td>
                <td><?= h($educationlevel->educationlevelname) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $educationlevel->educationlevelid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $educationlevel->educationlevelid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $educationlevel->educationlevelid], ['confirm' => __('Are you sure you want to delete # {0}?', $educationlevel->educationlevelid)]) ?>
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
