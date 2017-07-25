<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Country'), ['controller' => 'Country', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Country', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="city index large-9 medium-8 columns content">
    <h3><?= __('City') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('cityid') ?></th>
                <th><?= $this->Paginator->sort('cityname') ?></th>
                <th><?= $this->Paginator->sort('countryid') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($city as $city): ?>
            <tr>
                <td><?= $this->Number->format($city->cityid) ?></td>
                <td><?= h($city->cityname) ?></td>
                <td><?= $city->has('country') ? $this->Html->link($city->country->countryid, ['controller' => 'Country', 'action' => 'view', $city->country->countryid]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $city->cityid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $city->cityid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $city->cityid], ['confirm' => __('Are you sure you want to delete # {0}?', $city->cityid)]) ?>
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
