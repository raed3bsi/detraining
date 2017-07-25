<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coursematerial->materialid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coursematerial->materialid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Coursematerial'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="coursematerial form large-9 medium-8 columns content">
    <?= $this->Form->create($coursematerial) ?>
    <fieldset>
        <legend><?= __('Edit Coursematerial') ?></legend>
        <?php
            echo $this->Form->input('topicid');
            echo $this->Form->input('materialfile');
            echo $this->Form->input('materialname');
            echo $this->Form->input('mtypeid');
            echo $this->Form->input('filetype');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
