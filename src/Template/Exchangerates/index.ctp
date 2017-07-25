<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Exchangerate'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Journalentry'), ['controller' => 'Journalentry', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Journalentry'), ['controller' => 'Journalentry', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="exchangerates index large-9 medium-8 columns content">
    <h3><?= __('Exchangerates') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('exchangeid') ?></th>
                <th><?= $this->Paginator->sort('exchangedate') ?></th>
                <th><?= $this->Paginator->sort('fromcurrency') ?></th>
                <th><?= $this->Paginator->sort('tocurrency') ?></th>
                <th><?= $this->Paginator->sort('exchangerate') ?></th>
                <th><?= $this->Paginator->sort('inverserate') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exchangerates as $exchangerate): ?>
            <tr>
                <td><?= $this->Number->format($exchangerate->exchangeid) ?></td>
                <td><?= h($exchangerate->exchangedate) ?></td>
                <td><?= $this->Number->format($exchangerate->fromcurrency) ?></td>
                <td><?= $this->Number->format($exchangerate->tocurrency) ?></td>
                <td><?= $this->Number->format($exchangerate->exchangerate) ?></td>
                <td><?= $this->Number->format($exchangerate->inverserate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $exchangerate->exchangeid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exchangerate->exchangeid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exchangerate->exchangeid], ['confirm' => __('Are you sure you want to delete # {0}?', $exchangerate->exchangeid)]) ?>
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
