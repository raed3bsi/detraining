<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tporganizationtype'), ['action' => 'edit', $tporganizationtype->orgtypeid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tporganizationtype'), ['action' => 'delete', $tporganizationtype->orgtypeid], ['confirm' => __('Are you sure you want to delete # {0}?', $tporganizationtype->orgtypeid)]) ?> </li>
        <li><?= $this->Html->link(__('List Tporganizationtype'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tporganizationtype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tporganizationtype view large-9 medium-8 columns content">
    <h3><?= h($tporganizationtype->orgtypeid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Orgtypename') ?></th>
            <td><?= h($tporganizationtype->orgtypename) ?></td>
        </tr>
        <tr>
            <th><?= __('Orgtypeid') ?></th>
            <td><?= $this->Number->format($tporganizationtype->orgtypeid) ?></td>
        </tr>
        <tr>
            <th><?= __('Structureid') ?></th>
            <td><?= $this->Number->format($tporganizationtype->structureid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Orgtyperole') ?></h4>
        <?= $this->Text->autoParagraph(h($tporganizationtype->orgtyperole)); ?>
    </div>
</div>
