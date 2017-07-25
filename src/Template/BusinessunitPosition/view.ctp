<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Businessunit Position'), ['action' => 'edit', $businessunitPosition->businessunitpositionid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Businessunit Position'), ['action' => 'delete', $businessunitPosition->businessunitpositionid], ['confirm' => __('Are you sure you want to delete # {0}?', $businessunitPosition->businessunitpositionid)]) ?> </li>
        <li><?= $this->Html->link(__('List Businessunit Position'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Businessunit Position'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="businessunitPosition view large-9 medium-8 columns content">
    <h3><?= h($businessunitPosition->businessunitpositionid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Positionid') ?></th>
            <td><?= $this->Number->format($businessunitPosition->positionid) ?></td>
        </tr>
        <tr>
            <th><?= __('Businessunitid') ?></th>
            <td><?= $this->Number->format($businessunitPosition->businessunitid) ?></td>
        </tr>
        <tr>
            <th><?= __('Personid') ?></th>
            <td><?= $this->Number->format($businessunitPosition->personid) ?></td>
        </tr>
        <tr>
            <th><?= __('Businessunitpositionid') ?></th>
            <td><?= $this->Number->format($businessunitPosition->businessunitpositionid) ?></td>
        </tr>
        <tr>
            <th><?= __('Sgroupid') ?></th>
            <td><?= $this->Number->format($businessunitPosition->sgroupid) ?></td>
        </tr>
    </table>
</div>
