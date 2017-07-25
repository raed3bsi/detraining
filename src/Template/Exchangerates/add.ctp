<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Exchangerates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Journalentry'), ['controller' => 'Journalentry', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Journalentry'), ['controller' => 'Journalentry', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="exchangerates form large-9 medium-8 columns content">
    <?= $this->Form->create($exchangerate) ?>
    <fieldset>
        <legend><?= __('Add Exchangerate') ?></legend>
        <?php
            echo $this->Form->input('exchangedate');
            echo $this->Form->input('fromcurrency');
            echo $this->Form->input('tocurrency');
            echo $this->Form->input('exchangerate');
            echo $this->Form->input('inverserate');
            echo $this->Form->input('journalentry._ids', ['options' => $journalentry]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
