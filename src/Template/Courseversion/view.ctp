<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Courseversion'), ['action' => 'edit', $courseversion->versionid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Courseversion'), ['action' => 'delete', $courseversion->versionid], ['confirm' => __('Are you sure you want to delete # {0}?', $courseversion->versionid)]) ?> </li>
        <li><?= $this->Html->link(__('List Courseversion'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Courseversion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Topic'), ['controller' => 'Coursetopic', 'action' => 'index', $courseversion->versionid]) ?> </li>
    </ul>
</nav>
<div class="courseversion view large-9 medium-8 columns content">
    <h3><?= h($courseversion->versionid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Versionname') ?></th>
            <td><?= h($courseversion->versionname) ?></td>
        </tr>
        <tr>
            <th><?= __('Courseid') ?></th>
            <td><?= $this->Number->format($courseversion->courseid) ?></td>
        </tr>
        <tr>
            <th><?= __('Versionid') ?></th>
            <td><?= $this->Number->format($courseversion->versionid) ?></td>
        </tr>
        <tr>
            <th><?= __('Versionseq') ?></th>
            <td><?= $this->Number->format($courseversion->versionseq) ?></td>
        </tr>
        <tr>
            <th><?= __('Serviceid') ?></th>
            <td><?= $this->Number->format($courseversion->serviceid) ?></td>
        </tr>
        <tr>
            <th><?= __('Documentid') ?></th>
            <td><?= $this->Number->format($courseversion->documentid) ?></td>
        </tr>
        <tr>
            <th><?= __('Createdby') ?></th>
            <td><?= $this->Number->format($courseversion->createdby) ?></td>
        </tr>
        <tr>
            <th><?= __('Versionstatus') ?></th>
            <td><?= $this->Number->format($courseversion->versionstatus) ?></td>
        </tr>
        <tr>
            <th><?= __('Traininghours') ?></th>
            <td><?= $this->Number->format($courseversion->traininghours) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Coursedescription') ?></h4>
        <?= $this->Text->autoParagraph(h($courseversion->coursedescription)); ?>
    </div>
    <div class="row">
        <h4><?= __('Courseobjectives') ?></h4>
        <?= $this->Text->autoParagraph(h($courseversion->courseobjectives)); ?>
    </div>
    <div class="row">
        <h4><?= __('Coursegoals') ?></h4>
        <?= $this->Text->autoParagraph(h($courseversion->coursegoals)); ?>
    </div>
</div>
