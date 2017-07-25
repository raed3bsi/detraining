<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Currency'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="currency form large-9 medium-8 columns content">
    <?= $this->Form->create($currency) ?>
    <fieldset>
        <legend><?= __('Add Currency') ?></legend>
        <?php
            echo $this->Form->input('currencycode');
            echo $this->Form->input('currencyname');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
