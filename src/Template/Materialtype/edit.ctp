<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $materialtype->mtypeid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $materialtype->mtypeid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Materialtype'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="materialtype form large-9 medium-8 columns content">
    <?= $this->Form->create($materialtype) ?>
    <fieldset>
        <legend><?= __('Edit Materialtype') ?></legend>
        <?php
            echo $this->Form->input('mtypename');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
