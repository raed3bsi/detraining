<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $businessunitPosition->businessunitpositionid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $businessunitPosition->businessunitpositionid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Businessunit Position'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="businessunitPosition form large-9 medium-8 columns content">
    <?= $this->Form->create($businessunitPosition) ?>
    <fieldset>
        <legend><?= __('Edit Businessunit Position') ?></legend>
        <?php
            echo $this->Form->input('positionid');
            echo $this->Form->input('businessunitid');
            echo $this->Form->input('personid');
            echo $this->Form->input('sgroupid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
