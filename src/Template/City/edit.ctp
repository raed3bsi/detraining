<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $city->cityid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $city->cityid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List City'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Country'), ['controller' => 'Country', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Country', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="city form large-9 medium-8 columns content">
    <?= $this->Form->create($city) ?>
    <fieldset>
        <legend><?= __('Edit City') ?></legend>
        <?php
            echo $this->Form->input('cityname');
            echo $this->Form->input('countryid', ['options' => $country]);
            echo $this->Form->input('iscovered');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
