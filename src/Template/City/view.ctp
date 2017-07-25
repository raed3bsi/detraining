<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->cityid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->cityid], ['confirm' => __('Are you sure you want to delete # {0}?', $city->cityid)]) ?> </li>
        <li><?= $this->Html->link(__('List City'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Country'), ['controller' => 'Country', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Country', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="city view large-9 medium-8 columns content">
    <h3><?= h($city->cityname) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Cityname') ?></th>
            <td><?= h($city->cityname) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= $city->has('country') ? $this->Html->link($city->country->countryid, ['controller' => 'Country', 'action' => 'view', $city->country->countryid]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Cityid') ?></th>
            <td><?= $this->Number->format($city->cityid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Iscovered') ?></h4>
        <?= $this->Text->autoParagraph(h($city->iscovered)); ?>
    </div>
</div>
