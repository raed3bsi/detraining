<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Businessunit Position'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="businessunitPosition index large-9 medium-8 columns content">
    <h3><?= __('Businessunit Position') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('positionid') ?></th>
                <th><?= $this->Paginator->sort('businessunitid') ?></th>
                <th><?= $this->Paginator->sort('personid') ?></th>
                <th><?= $this->Paginator->sort('businessunitpositionid') ?></th>
                <th><?= $this->Paginator->sort('sgroupid') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($businessunitPosition as $businessunitPosition): ?>
            <tr>
                <td><?= $this->Number->format($businessunitPosition->positionid) ?></td>
                <td><?= $this->Number->format($businessunitPosition->businessunitid) ?></td>
                <td><?= $this->Number->format($businessunitPosition->personid) ?></td>
                <td><?= $this->Number->format($businessunitPosition->businessunitpositionid) ?></td>
                <td><?= $this->Number->format($businessunitPosition->sgroupid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $businessunitPosition->businessunitpositionid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $businessunitPosition->businessunitpositionid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $businessunitPosition->businessunitpositionid], ['confirm' => __('Are you sure you want to delete # {0}?', $businessunitPosition->businessunitpositionid)]) ?>
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
