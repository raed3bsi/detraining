<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->personid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->personid], ['confirm' => __('Are you sure you want to delete # {0}?', $person->personid)]) ?> </li>
        <li><?= $this->Html->link(__('List Person'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="person view large-9 medium-8 columns content">
    <h3><?= h($person->personid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Personname') ?></th>
            <td><?= h($person->personname) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($person->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Mobile') ?></th>
            <td><?= h($person->mobile) ?></td>
        </tr>
        <tr>
            <th><?= __('Workphone') ?></th>
            <td><?= h($person->workphone) ?></td>
        </tr>
        <tr>
            <th><?= __('Personid') ?></th>
            <td><?= $this->Number->format($person->personid) ?></td>
        </tr>
        <tr>
            <th><?= __('Addressid') ?></th>
            <td><?= $this->Number->format($person->addressid) ?></td>
        </tr>
        <tr>
            <th><?= __('Educationlevelid') ?></th>
            <td><?= $this->Number->format($person->educationlevelid) ?></td>
        </tr>
        <tr>
            <th><?= __('Persontype') ?></th>
            <td><?= $this->Number->format($person->persontype) ?></td>
        </tr>
        <tr>
            <th><?= __('Dateofbirth') ?></th>
            <td><?= h($person->dateofbirth) ?></td>
        </tr>
        <tr>
            <th><?= __('Registrationdate') ?></th>
            <td><?= h($person->registrationdate) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Gender') ?></h4>
        <?= $this->Text->autoParagraph(h($person->gender)); ?>
    </div>
</div>
