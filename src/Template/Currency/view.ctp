<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Currency'), ['action' => 'edit', $currency->currencyid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Currency'), ['action' => 'delete', $currency->currencyid], ['confirm' => __('Are you sure you want to delete # {0}?', $currency->currencyid)]) ?> </li>
        <li><?= $this->Html->link(__('List Currency'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="currency view large-9 medium-8 columns content">
    <h3><?= h($currency->currencyid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Currencycode') ?></th>
            <td><?= h($currency->currencycode) ?></td>
        </tr>
        <tr>
            <th><?= __('Currencyname') ?></th>
            <td><?= h($currency->currencyname) ?></td>
        </tr>
        <tr>
            <th><?= __('Currencyid') ?></th>
            <td><?= $this->Number->format($currency->currencyid) ?></td>
        </tr>
    </table>
</div>
