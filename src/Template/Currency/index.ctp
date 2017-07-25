<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="currency index large-9 medium-8 columns content">
    <h3><?= __('Currency') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('currencyid') ?></th>
                <th><?= $this->Paginator->sort('currencycode') ?></th>
                <th><?= $this->Paginator->sort('currencyname') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($currency as $currency): ?>
            <tr>
                <td><?= $this->Number->format($currency->currencyid) ?></td>
                <td><?= h($currency->currencycode) ?></td>
                <td><?= h($currency->currencyname) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $currency->currencyid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $currency->currencyid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $currency->currencyid], ['confirm' => __('Are you sure you want to delete # {0}?', $currency->currencyid)]) ?>
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
