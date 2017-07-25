<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Specializationlevel'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="specializationlevel index large-9 medium-8 columns content">
    <h3><?= __('Specializationlevel') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('slevelid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('levelno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('levelname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specializationid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($specializationlevel as $specializationlevel): ?>
            <tr>
                <td><?= $this->Number->format($specializationlevel->slevelid) ?></td>
                <td><?= $this->Number->format($specializationlevel->levelno) ?></td>
                <td><?= h($specializationlevel->levelname) ?></td>
                <td><?= $this->Number->format($specializationlevel->specializationid) ?></td>
                <td><?= $this->Number->format($specializationlevel->duration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $specializationlevel->slevelid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $specializationlevel->slevelid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $specializationlevel->slevelid], ['confirm' => __('Are you sure you want to delete # {0}?', $specializationlevel->slevelid)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
