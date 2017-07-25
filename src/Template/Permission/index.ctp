<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Permission'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Amodel'), ['controller' => 'Appmodel', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Amodel'), ['controller' => 'Appmodel', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permission index large-9 medium-8 columns content">
    <h3><?= __('Permission') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('permissionid') ?></th>
                <th><?= $this->Paginator->sort('permissionname') ?></th>
                <th><?= $this->Paginator->sort('pgroupid') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permission as $permission): ?>
            <tr>
                <td><?= $this->Number->format($permission->permissionid) ?></td>
                <td><?= h($permission->permissionname) ?></td>
                <td><?= $this->Number->format($permission->pgroupid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $permission->permissionid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permission->permissionid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permission->permissionid], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->permissionid)]) ?>
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
