<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Organizationstructure'), ['action' => 'edit', $organizationstructure->structureid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Organizationstructure'), ['action' => 'delete', $organizationstructure->structureid], ['confirm' => __('Are you sure you want to delete # {0}?', $organizationstructure->structureid)]) ?> </li>
        <li><?= $this->Html->link(__('List Organizationstructure'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organizationstructure'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="organizationstructure view large-9 medium-8 columns content">
    <h3><?= h($organizationstructure->structureid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Structurehint') ?></th>
            <td><?= h($organizationstructure->structurehint) ?></td>
        </tr>
        <tr>
            <th><?= __('Structureid') ?></th>
            <td><?= $this->Number->format($organizationstructure->structureid) ?></td>
        </tr>
    </table>
</div>
