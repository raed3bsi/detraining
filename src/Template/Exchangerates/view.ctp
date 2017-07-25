<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exchangerate'), ['action' => 'edit', $exchangerate->exchangeid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exchangerate'), ['action' => 'delete', $exchangerate->exchangeid], ['confirm' => __('Are you sure you want to delete # {0}?', $exchangerate->exchangeid)]) ?> </li>
        <li><?= $this->Html->link(__('List Exchangerates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exchangerate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Journalentry'), ['controller' => 'Journalentry', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Journalentry'), ['controller' => 'Journalentry', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="exchangerates view large-9 medium-8 columns content">
    <h3><?= h($exchangerate->exchangeid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Exchangeid') ?></th>
            <td><?= $this->Number->format($exchangerate->exchangeid) ?></td>
        </tr>
        <tr>
            <th><?= __('Fromcurrency') ?></th>
            <td><?= $this->Number->format($exchangerate->fromcurrency) ?></td>
        </tr>
        <tr>
            <th><?= __('Tocurrency') ?></th>
            <td><?= $this->Number->format($exchangerate->tocurrency) ?></td>
        </tr>
        <tr>
            <th><?= __('Exchangerate') ?></th>
            <td><?= $this->Number->format($exchangerate->exchangerate) ?></td>
        </tr>
        <tr>
            <th><?= __('Inverserate') ?></th>
            <td><?= $this->Number->format($exchangerate->inverserate) ?></td>
        </tr>
        <tr>
            <th><?= __('Exchangedate') ?></th>
            <td><?= h($exchangerate->exchangedate) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Journalentry') ?></h4>
        <?php if (!empty($exchangerate->journalentry)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Transactionid') ?></th>
                <th><?= __('Jetypeid') ?></th>
                <th><?= __('Journaldate') ?></th>
                <th><?= __('Insertedon') ?></th>
                <th><?= __('Transactioncurrency') ?></th>
                <th><?= __('Journalstatus') ?></th>
                <th><?= __('Createdby') ?></th>
                <th><?= __('Documentid') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($exchangerate->journalentry as $journalentry): ?>
            <tr>
                <td><?= h($journalentry->transactionid) ?></td>
                <td><?= h($journalentry->jetypeid) ?></td>
                <td><?= h($journalentry->journaldate) ?></td>
                <td><?= h($journalentry->insertedon) ?></td>
                <td><?= h($journalentry->transactioncurrency) ?></td>
                <td><?= h($journalentry->journalstatus) ?></td>
                <td><?= h($journalentry->createdby) ?></td>
                <td><?= h($journalentry->documentid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Journalentry', 'action' => 'view', $journalentry->transactionid]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Journalentry', 'action' => 'edit', $journalentry->transactionid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Journalentry', 'action' => 'delete', $journalentry->transactionid], ['confirm' => __('Are you sure you want to delete # {0}?', $journalentry->transactionid)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
