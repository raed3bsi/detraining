<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Positiontemplate'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="positiontemplate form large-9 medium-8 columns content">
    <?= $this->Form->create($positiontemplate) ?>
    <fieldset>
        <legend><?= __('Add Positiontemplate') ?></legend>
        <?php
            echo $this->Form->input('jobid');
            echo $this->Form->input('butypeid');
            echo $this->Form->input('rootunitid');
            echo $this->Form->input('instances');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
