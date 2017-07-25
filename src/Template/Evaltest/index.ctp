<div class="easyui-layout" data-options="fit:true">
<div data-options="region:'west',split:true" title="<?= __('Actions') ?>" style="width:200px;">
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Evaltest'), ['action' => 'add']) ?></li>
    </ul>
</nav>
</div>
<div data-options="region:'center',title:'<?= __('Evaltest') ?>',iconCls:'icon-ok'">

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('testid') ?></th>
                <th><?= $this->Paginator->sort('testduration') ?></th>
                <th><?= $this->Paginator->sort('durationunitfactor') ?></th>
                <th><?= $this->Paginator->sort('tcategoryid') ?></th>
                <th><?= $this->Paginator->sort('testtitle') ?></th>
                <th><?= $this->Paginator->sort('testdescription') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evaltest as $evaltest): ?>
            <tr>
                <td><?= $this->Number->format($evaltest->testid) ?></td>
                <td><?= $this->Number->format($evaltest->testduration) ?></td>
                <td><?= $this->Number->format($evaltest->durationunitfactor) ?></td>
                <td><?= $this->Number->format($evaltest->tcategoryid) ?></td>
                <td><?= h($evaltest->testtitle) ?></td>
                <td><?= h($evaltest->testdescription) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $evaltest->testid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'add', 0, $evaltest->testid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $evaltest->testid], ['confirm' => __('Are you sure you want to delete # {0}?', $evaltest->testid)]) ?>
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
</div>