<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Department'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="department form large-9 medium-8 columns content">
    <?= $this->Form->create($department) ?>
    <fieldset>
        <legend><?= __('Add Department') ?></legend>
        <?php
            echo $this->Form->input('departmentname');
            echo $this->Form->input('parentdeptid', ['options' => $parentdepts]);
            echo $this->Form->input('depttypeid');
            echo $this->Form->input('bunitid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
