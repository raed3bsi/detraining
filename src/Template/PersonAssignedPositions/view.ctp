<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Person Assigned Position'), ['action' => 'edit', $personAssignedPosition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Person Assigned Position'), ['action' => 'delete', $personAssignedPosition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personAssignedPosition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Person Assigned Positions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person Assigned Position'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="personAssignedPositions view large-9 medium-8 columns content">
    <h3><?= h($personAssignedPosition->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($personAssignedPosition->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Personid') ?></th>
            <td><?= $this->Number->format($personAssignedPosition->personid) ?></td>
        </tr>
        <tr>
            <th><?= __('Positionid') ?></th>
            <td><?= $this->Number->format($personAssignedPosition->positionid) ?></td>
        </tr>
        <tr>
            <th><?= __('Validfrom') ?></th>
            <td><?= h($personAssignedPosition->validfrom) ?></td>
        </tr>
        <tr>
            <th><?= __('Validuntil') ?></th>
            <td><?= h($personAssignedPosition->validuntil) ?></td>
        </tr>
        <tr>
            <th><?= __('Activatedon') ?></th>
            <td><?= h($personAssignedPosition->activatedon) ?></td>
        </tr>
        <tr>
            <th><?= __('Invalidatedon') ?></th>
            <td><?= h($personAssignedPosition->invalidatedon) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Assignmentstatus') ?></h4>
        <?= $this->Text->autoParagraph(h($personAssignedPosition->assignmentstatus)); ?>
    </div>
</div>
