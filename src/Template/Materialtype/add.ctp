<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Materialtype'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="materialtype form large-9 medium-8 columns content">
    <?= $this->Form->create($materialtype) ?>
    <fieldset>
        <legend><?= __('Add Materialtype') ?></legend>
        <?php
            echo $this->Form->input('mtypename');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
