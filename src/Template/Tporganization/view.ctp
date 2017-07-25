<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tporganization'), ['action' => 'edit', $tporganization->organizationid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tporganization'), ['action' => 'delete', $tporganization->organizationid], ['confirm' => __('Are you sure you want to delete # {0}?', $tporganization->organizationid)]) ?> </li>
        <li><?= $this->Html->link(__('List Tporganization'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tporganization'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tporganization view large-9 medium-8 columns content">
    <h3><?= h($tporganization->organizationid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Organizationname') ?></th>
            <td><?= h($tporganization->organizationname) ?></td>
        </tr>
        <tr>
            <th><?= __('Organizationid') ?></th>
            <td><?= $this->Number->format($tporganization->organizationid) ?></td>
        </tr>
        <tr>
            <th><?= __('Addressid') ?></th>
            <td><?= $this->Number->format($tporganization->addressid) ?></td>
        </tr>
        <tr>
            <th><?= __('Orgtypeid') ?></th>
            <td><?= $this->Number->format($tporganization->orgtypeid) ?></td>
        </tr>
        <tr>
            <th><?= __('Structureid') ?></th>
            <td><?= $this->Number->format($tporganization->structureid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Organizationdescription') ?></h4>
        <?= $this->Text->autoParagraph(h($tporganization->organizationdescription)); ?>
    </div>
</div>
