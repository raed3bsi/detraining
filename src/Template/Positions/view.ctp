<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Position'), ['action' => 'edit', $position->positionid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Position'), ['action' => 'delete', $position->positionid], ['confirm' => __('Are you sure you want to delete # {0}?', $position->positionid)]) ?> </li>
        <li><?= $this->Html->link(__('List Positions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Position'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Securitygroup'), ['controller' => 'Securitygroup', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Securitygroup'), ['controller' => 'Securitygroup', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="positions view large-9 medium-8 columns content">
    <h3><?= h($position->positionid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Positionname') ?></th>
            <td><?= h($position->positionname) ?></td>
        </tr>
        <tr>
            <th><?= __('Securitygroup') ?></th>
            <td><?= $position->has('securitygroup') ? $this->Html->link($position->securitygroup->sgroupid, ['controller' => 'Securitygroup', 'action' => 'view', $position->securitygroup->sgroupid]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Positionid') ?></th>
            <td><?= $this->Number->format($position->positionid) ?></td>
        </tr>
        <tr>
            <th><?= __('Jobid') ?></th>
            <td><?= $this->Number->format($position->jobid) ?></td>
        </tr>
        <tr>
            <th><?= __('Businessunitid') ?></th>
            <td><?= $this->Number->format($position->businessunitid) ?></td>
        </tr>
        <tr>
            <th><?= __('Maxnoinstances') ?></th>
            <td><?= $this->Number->format($position->maxnoinstances) ?></td>
        </tr>
    </table>
</div>
