<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Person Assigned Positions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="personAssignedPositions form large-9 medium-8 columns content">
    <?= $this->Form->create($personAssignedPosition) ?>
    <fieldset>
        <legend><?= __('Add Person Assigned Position') ?></legend>
        <?php
            echo $this->Form->input('personid');
            echo $this->Form->input('positionid');
            echo $this->Form->input('validfrom', ['empty' => true]);
            echo $this->Form->input('validuntil', ['empty' => true]);
            echo $this->Form->input('assignmentstatus');
            echo $this->Form->input('activatedon', ['empty' => true]);
            echo $this->Form->input('invalidatedon', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
