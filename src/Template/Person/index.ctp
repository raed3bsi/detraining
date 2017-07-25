<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="person index large-9 medium-8 columns content">
    <h3><?= __('Person') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('personid') ?></th>
                <th><?= $this->Paginator->sort('personname') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('dateofbirth') ?></th>
                <th><?= $this->Paginator->sort('mobile') ?></th>
                <th><?= $this->Paginator->sort('workphone') ?></th>
                <th><?= $this->Paginator->sort('addressid') ?></th>
                <th><?= $this->Paginator->sort('educationlevelid') ?></th>
                <th><?= $this->Paginator->sort('registrationdate') ?></th>
                <th><?= $this->Paginator->sort('persontype') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($person as $person): ?>
            <tr>
                <td><?= $this->Number->format($person->personid) ?></td>
                <td><?= h($person->personname) ?></td>
                <td><?= h($person->email) ?></td>
                <td><?= h($person->dateofbirth) ?></td>
                <td><?= h($person->mobile) ?></td>
                <td><?= h($person->workphone) ?></td>
                <td><?= $this->Number->format($person->addressid) ?></td>
                <td><?= $this->Number->format($person->educationlevelid) ?></td>
                <td><?= h($person->registrationdate) ?></td>
                <td><?= $this->Number->format($person->persontype) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $person->personid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->personid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->personid], ['confirm' => __('Are you sure you want to delete # {0}?', $person->personid)]) ?>
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
