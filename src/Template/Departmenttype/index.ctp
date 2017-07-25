<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Departmenttype'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="departmenttype index large-9 medium-8 columns content">
    <h3><?= __('Departmenttype') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('depttypeid') ?></th>
                <th><?= $this->Paginator->sort('depttypename') ?></th>
                <th><?= $this->Paginator->sort('subtypeid') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($departmenttype as $departmenttype): ?>
            <tr>
                <td><?= $this->Number->format($departmenttype->depttypeid) ?></td>
                <td><?= h($departmenttype->depttypename) ?></td>
                <td><?php if($departmenttype->subtype!=NULL): ?>
                <?= 
                $departmenttype->subtype->depttypename ?>
                <?php endif; ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $departmenttype->depttypeid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $departmenttype->depttypeid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $departmenttype->depttypeid], ['confirm' => __('Are you sure you want to delete # {0}?', $departmenttype->depttypeid)]) ?>
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
