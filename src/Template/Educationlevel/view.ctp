<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Educationlevel'), ['action' => 'edit', $educationlevel->educationlevelid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Educationlevel'), ['action' => 'delete', $educationlevel->educationlevelid], ['confirm' => __('Are you sure you want to delete # {0}?', $educationlevel->educationlevelid)]) ?> </li>
        <li><?= $this->Html->link(__('List Educationlevel'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Educationlevel'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="educationlevel view large-9 medium-8 columns content">
    <h3><?= h($educationlevel->educationlevelid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Educationlevelname') ?></th>
            <td><?= h($educationlevel->educationlevelname) ?></td>
        </tr>
        <tr>
            <th><?= __('Educationlevelid') ?></th>
            <td><?= $this->Number->format($educationlevel->educationlevelid) ?></td>
        </tr>
    </table>
</div>
