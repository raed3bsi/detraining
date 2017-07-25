<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Permission'), ['action' => 'edit', $permission->permissionid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permission'), ['action' => 'delete', $permission->permissionid], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->permissionid)]) ?> </li>
        <li><?= $this->Html->link(__('List Permission'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Permission'), ['controller' => 'Permission', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Permission'), ['controller' => 'Permission', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Amodel'), ['controller' => 'Appmodel', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Amodel'), ['controller' => 'Appmodel', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="permission view large-9 medium-8 columns content">
    <h3><?= h($permission->permissionid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Permissionname') ?></th>
            <td><?= h($permission->permissionname) ?></td>
        </tr>
        <tr>
            <th><?= __('Permissionid') ?></th>
            <td><?= $this->Number->format($permission->permissionid) ?></td>
        </tr>
        <tr>
            <th><?= __('Pgroupid') ?></th>
            <td><?= $this->Number->format($permission->pgroupid) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Permission') ?></h4>
        <?php if (!empty($permission->child_permission)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Permissionid') ?></th>
                <th><?= __('Permissionname') ?></th>
                <th><?= __('Pgroupid') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($permission->child_permission as $childPermission): ?>
            <tr>
                <td><?= h($childPermission->permissionid) ?></td>
                <td><?= h($childPermission->permissionname) ?></td>
                <td><?= h($childPermission->pgroupid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Permission', 'action' => 'view', $childPermission->permissionid]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Permission', 'action' => 'edit', $childPermission->permissionid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Permission', 'action' => 'delete', $childPermission->permissionid], ['confirm' => __('Are you sure you want to delete # {0}?', $childPermission->permissionid)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
