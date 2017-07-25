<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $organizationstructure->structureid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $organizationstructure->structureid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Organizationstructure'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="organizationstructure form large-9 medium-8 columns content">
    <?= $this->Form->create($organizationstructure) ?>
    <fieldset>
        <legend><?= __('Edit Organizationstructure') ?></legend>
        <?php
            echo $this->Form->input('structurehint');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
