<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php foreach ($depttypes as $dt): ?>
        <?php if($dt->supertype!=NULL): ?>
        <li><?= $this->Html->link(__('New '.$dt->depttypename), ['action' => 'add', $dt->depttypeid]) ?></li>
        <?php endif;?>
        <?php endforeach;?>
    </ul>
</nav>
<div class="department index large-9 medium-8 columns content">
    <h3><?= __('Department') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('departmentname','Department name') ?></th>
                <th><?= $this->Paginator->sort('parentdeptid','Parent department') ?></th>
                <th><?= $this->Paginator->sort('depttypeid','Department type') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($department as $department): ?>
            <tr>
                <td><?= h($department->departmentname) ?></td>
                <td><?= h($department->parentdept==NULL? '':$department->parentdept->departmentname) ?></td>
                <td><?= h($department->depttype->depttypename) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $department->departmentid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $department->departmentid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $department->departmentid], ['confirm' => __('Are you sure you want to delete # {0}?', $department->departmentid)]) ?>
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
