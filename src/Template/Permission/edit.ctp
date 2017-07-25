<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $permission->permissionid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $permission->permissionid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Permission'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Permission'), ['controller' => 'Permission', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Permission'), ['controller' => 'Permission', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Amodel'), ['controller' => 'Appmodel', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Amodel'), ['controller' => 'Appmodel', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permission form large-9 medium-8 columns content">
    <?= $this->Form->create($permission) ?>
    <fieldset>
        <legend><?= __('Edit Permission') ?></legend>
        <?php
            echo $this->Form->input('permissionname');
            echo $this->Form->input('pgroupid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
