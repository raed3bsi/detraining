<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Person Assigned Position'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="personAssignedPositions index large-9 medium-8 columns content">
    <h3><?= __('Person Assigned Positions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('personid') ?></th>
                <th><?= $this->Paginator->sort('positionid') ?></th>
                <th><?= $this->Paginator->sort('validfrom') ?></th>
                <th><?= $this->Paginator->sort('validuntil') ?></th>
                <th><?= $this->Paginator->sort('activatedon') ?></th>
                <th><?= $this->Paginator->sort('invalidatedon') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personAssignedPositions as $personAssignedPosition): ?>
            <tr>
                <td><?= $this->Number->format($personAssignedPosition->id) ?></td>
                <td><?= $this->Number->format($personAssignedPosition->personid) ?></td>
                <td><?= $this->Number->format($personAssignedPosition->positionid) ?></td>
                <td><?= h($personAssignedPosition->validfrom) ?></td>
                <td><?= h($personAssignedPosition->validuntil) ?></td>
                <td><?= h($personAssignedPosition->activatedon) ?></td>
                <td><?= h($personAssignedPosition->invalidatedon) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $personAssignedPosition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $personAssignedPosition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $personAssignedPosition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personAssignedPosition->id)]) ?>
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
