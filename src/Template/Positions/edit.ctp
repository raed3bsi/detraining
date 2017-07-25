<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $position->positionid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $position->positionid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Positions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Securitygroup'), ['controller' => 'Securitygroup', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Securitygroup'), ['controller' => 'Securitygroup', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="positions form large-9 medium-8 columns content">
    <?= $this->Form->create($position) ?>
    <fieldset>
        <legend><?= __('Edit Position') ?></legend>
        <?php
            echo $this->Form->input('positionname');
            echo $this->Form->input('sgroupid', ['options' => $securitygroup]);
            echo $this->Form->input('jobid');
            echo $this->Form->input('businessunitid');
            echo $this->Form->input('maxnoinstances');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
