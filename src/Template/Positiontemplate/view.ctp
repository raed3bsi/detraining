<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Positiontemplate'), ['action' => 'edit', $positiontemplate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Positiontemplate'), ['action' => 'delete', $positiontemplate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $positiontemplate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Positiontemplate'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Positiontemplate'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="positiontemplate view large-9 medium-8 columns content">
    <h3><?= h($positiontemplate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($positiontemplate->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Jobid') ?></th>
            <td><?= $this->Number->format($positiontemplate->jobid) ?></td>
        </tr>
        <tr>
            <th><?= __('Butypeid') ?></th>
            <td><?= $this->Number->format($positiontemplate->butypeid) ?></td>
        </tr>
        <tr>
            <th><?= __('Rootunitid') ?></th>
            <td><?= $this->Number->format($positiontemplate->rootunitid) ?></td>
        </tr>
        <tr>
            <th><?= __('Instances') ?></th>
            <td><?= $this->Number->format($positiontemplate->instances) ?></td>
        </tr>
    </table>
</div>
