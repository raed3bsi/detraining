<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Specializationlevel'), ['action' => 'edit', $specializationlevel->slevelid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Specializationlevel'), ['action' => 'delete', $specializationlevel->slevelid], ['confirm' => __('Are you sure you want to delete # {0}?', $specializationlevel->slevelid)]) ?> </li>
        <li><?= $this->Html->link(__('List Specializationlevel'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specializationlevel'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="specializationlevel view large-9 medium-8 columns content">
    <h3><?= h($specializationlevel->slevelid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Levelname') ?></th>
            <td><?= h($specializationlevel->levelname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slevelid') ?></th>
            <td><?= $this->Number->format($specializationlevel->slevelid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Levelno') ?></th>
            <td><?= $this->Number->format($specializationlevel->levelno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specializationid') ?></th>
            <td><?= $this->Number->format($specializationlevel->specializationid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $this->Number->format($specializationlevel->duration) ?></td>
        </tr>
    </table>
</div>
