<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Coursematerial'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="coursematerial index large-9 medium-8 columns content">
    <h3><?= __('Coursematerial') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('materialid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('topicid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('materialfile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('materialname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mtypeid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('filetype') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coursematerial as $coursematerial): ?>
            <tr>
                <td><?= $this->Number->format($coursematerial->materialid) ?></td>
                <td><?= $this->Number->format($coursematerial->topicid) ?></td>
                <td><?= h($coursematerial->materialfile) ?></td>
                <td><?= h($coursematerial->materialname) ?></td>
                <td><?= $this->Number->format($coursematerial->mtypeid) ?></td>
                <td><?= h($coursematerial->filetype) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $coursematerial->materialid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coursematerial->materialid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coursematerial->materialid], ['confirm' => __('Are you sure you want to delete # {0}?', $coursematerial->materialid)]) ?>
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
