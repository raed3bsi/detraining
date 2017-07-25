<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Placementtest'), ['action' => 'edit', $placementtest->ptestid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Placementtest'), ['action' => 'delete', $placementtest->ptestid], ['confirm' => __('Are you sure you want to delete # {0}?', $placementtest->ptestid)]) ?> </li>
        <li><?= $this->Html->link(__('List Placementtest'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Placementtest'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="placementtest view large-9 medium-8 columns content">
    <h3><?= h($placementtest->ptestid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Ptestnumber') ?></th>
            <td><?= h($placementtest->ptestnumber) ?></td>
        </tr>
        <tr>
            <th><?= __('Ptestname') ?></th>
            <td><?= h($placementtest->ptestname) ?></td>
        </tr>
        <tr>
            <th><?= __('Ptestid') ?></th>
            <td><?= $this->Number->format($placementtest->ptestid) ?></td>
        </tr>
        <tr>
            <th><?= __('Evaltestid') ?></th>
            <td><?= $this->Number->format($placementtest->evaltestid) ?></td>
        </tr>
        <tr>
            <th><?= __('Pteststatus') ?></th>
            <td><?= $this->Number->format($placementtest->pteststatus) ?></td>
        </tr>
        <tr>
            <th><?= __('Documentid') ?></th>
            <td><?= $this->Number->format($placementtest->documentid) ?></td>
        </tr>
        <tr>
            <th><?= __('Createdby') ?></th>
            <td><?= $this->Number->format($placementtest->createdby) ?></td>
        </tr>
        <tr>
            <th><?= __('Serviceid') ?></th>
            <td><?= $this->Number->format($placementtest->serviceid) ?></td>
        </tr>
    </table>
</div>
