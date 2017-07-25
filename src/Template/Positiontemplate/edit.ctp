<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $positiontemplate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $positiontemplate->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Positiontemplate'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="positiontemplate form large-9 medium-8 columns content">
    <?= $this->Form->create($positiontemplate) ?>
    <fieldset>
        <legend><?= __('Edit Positiontemplate') ?></legend>
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
