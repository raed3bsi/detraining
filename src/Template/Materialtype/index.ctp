<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Materialtype'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materialtype index large-9 medium-8 columns content">
    <h3><?= __('Materialtype') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('mtypeid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mtypename') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materialtype as $materialtype): ?>
            <tr>
                <td><?= $this->Number->format($materialtype->mtypeid) ?></td>
                <td><?= h($materialtype->mtypename) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $materialtype->mtypeid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $materialtype->mtypeid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $materialtype->mtypeid], ['confirm' => __('Are you sure you want to delete # {0}?', $materialtype->mtypeid)]) ?>
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
