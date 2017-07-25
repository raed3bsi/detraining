<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Businessunit'), ['action' => 'edit', $businessunit->businessunitid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Businessunit'), ['action' => 'delete', $businessunit->businessunitid], ['confirm' => __('Are you sure you want to delete # {0}?', $businessunit->businessunitid)]) ?> </li>
        <li><?= $this->Html->link(__('List Businessunit'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Businessunit'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="businessunit view large-9 medium-8 columns content">
    <h3><?= h($businessunit->businessunitname) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Businessunitname') ?></th>
            <td><?= h($businessunit->businessunitname) ?></td>
        </tr>
        <tr>
            <th><?= __('Businessunitid') ?></th>
            <td><?= $this->Number->format($businessunit->businessunitid) ?></td>
        </tr>
        <tr>
            <th><?= __('Superunitid') ?></th>
            <td><?= $this->Number->format($businessunit->superunitid) ?></td>
        </tr>
        <tr>
            <th><?= __('Butypeid') ?></th>
            <td><?= $this->Number->format($businessunit->butypeid) ?></td>
        </tr>
        <tr>
            <th><?= __('Level') ?></th>
            <td><?= $this->Number->format($businessunit->level) ?></td>
        </tr>
        <tr>
            <th><?= __('Lft') ?></th>
            <td><?= $this->Number->format($businessunit->lft) ?></td>
        </tr>
        <tr>
            <th><?= __('Rght') ?></th>
            <td><?= $this->Number->format($businessunit->rght) ?></td>
        </tr>
        <tr>
            <th><?= __('Expirationdate') ?></th>
            <td><?= h($businessunit->expirationdate) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Businessunitstatus') ?></h4>
        <?= $this->Text->autoParagraph(h($businessunit->businessunitstatus)); ?>
    </div>
</div>
