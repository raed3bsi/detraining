<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Evaltest'), ['action' => 'edit', $evaltest->testid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Evaltest'), ['action' => 'delete', $evaltest->testid], ['confirm' => __('Are you sure you want to delete # {0}?', $evaltest->testid)]) ?> </li>
        <li><?= $this->Html->link(__('List Evaltest'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evaltest'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="evaltest view large-9 medium-8 columns content">
    <h3><?= h($evaltest->testid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Testtitle') ?></th>
            <td><?= h($evaltest->testtitle) ?></td>
        </tr>
        <tr>
            <th><?= __('Testdescription') ?></th>
            <td><?= h($evaltest->testdescription) ?></td>
        </tr>
        <tr>
            <th><?= __('Testid') ?></th>
            <td><?= $this->Number->format($evaltest->testid) ?></td>
        </tr>
        <tr>
            <th><?= __('Testduration') ?></th>
            <td><?= $this->Number->format($evaltest->testduration) ?></td>
        </tr>
        <tr>
            <th><?= __('Durationunitfactor') ?></th>
            <td><?= $this->Number->format($evaltest->durationunitfactor) ?></td>
        </tr>
        <tr>
            <th><?= __('Tcategoryid') ?></th>
            <td><?= $this->Number->format($evaltest->tcategoryid) ?></td>
        </tr>
    </table>
</div>
