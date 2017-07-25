<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Departmenttype'), ['action' => 'edit', $departmenttype->depttypeid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Departmenttype'), ['action' => 'delete', $departmenttype->depttypeid], ['confirm' => __('Are you sure you want to delete # {0}?', $departmenttype->depttypeid)]) ?> </li>
        <li><?= $this->Html->link(__('List Departmenttype'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Departmenttype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="departmenttype view large-9 medium-8 columns content">
    <h3><?= h($departmenttype->depttypeid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Depttypename') ?></th>
            <td><?= h($departmenttype->depttypename) ?></td>
        </tr>
        <tr>
            <th><?= __('Depttypeid') ?></th>
            <td><?= $this->Number->format($departmenttype->depttypeid) ?></td>
        </tr>
        <tr>
            <th><?= __('Subtypeid') ?></th>
            <td><?= $this->Number->format($departmenttype->subtypeid) ?></td>
        </tr>
    </table>
</div>
