<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Placementtest'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="placementtest index large-9 medium-8 columns content">
    <h3><?= __('Placementtest') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('ptestid') ?></th>
                <th><?= $this->Paginator->sort('evaltestid') ?></th>
                <th><?= $this->Paginator->sort('ptestnumber') ?></th>
                <th><?= $this->Paginator->sort('pteststatus') ?></th>
                <th><?= $this->Paginator->sort('documentid') ?></th>
                <th><?= $this->Paginator->sort('createdby') ?></th>
                <th><?= $this->Paginator->sort('serviceid') ?></th>
                <th><?= $this->Paginator->sort('ptestname') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($placementtest as $placementtest): ?>
            <tr>
                <td><?= $this->Number->format($placementtest->ptestid) ?></td>
                <td><?= $this->Number->format($placementtest->evaltestid) ?></td>
                <td><?= h($placementtest->ptestnumber) ?></td>
                <td><?= $this->Number->format($placementtest->pteststatus) ?></td>
                <td><?= $this->Number->format($placementtest->documentid) ?></td>
                <td><?= $this->Number->format($placementtest->createdby) ?></td>
                <td><?= $this->Number->format($placementtest->serviceid) ?></td>
                <td><?= h($placementtest->ptestname) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $placementtest->ptestid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $placementtest->ptestid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $placementtest->ptestid], ['confirm' => __('Are you sure you want to delete # {0}?', $placementtest->ptestid)]) ?>
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
