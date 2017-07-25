<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Department'), ['action' => 'edit', $department->departmentid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Department'), ['action' => 'delete', $department->departmentid], ['confirm' => __('Are you sure you want to delete # {0}?', $department->departmentid)]) ?> </li>
        <li><?= $this->Html->link(__('List Department'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="department view large-9 medium-8 columns content">
    <h3><?= h($department->departmentid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Departmentname') ?></th>
            <td><?= h($department->departmentname) ?></td>
        </tr>
        <tr>
            <th><?= __('Departmentid') ?></th>
            <td><?= $this->Number->format($department->departmentid) ?></td>
        </tr>
        <tr>
            <th><?= __('Parentdeptid') ?></th>
            <td><?= $this->Number->format($department->parentdeptid) ?></td>
        </tr>
        <tr>
            <th><?= __('Depttypeid') ?></th>
            <td><?= $this->Number->format($department->depttypeid) ?></td>
        </tr>
        <tr>
            <th><?= __('Bunitid') ?></th>
            <td><?= $this->Number->format($department->bunitid) ?></td>
        </tr>
    </table>
</div>
