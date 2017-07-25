<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $departmenttype->depttypeid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $departmenttype->depttypeid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Departmenttype'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="departmenttype form large-9 medium-8 columns content">
    <?= $this->Form->create($departmenttype) ?>
    <fieldset>
        <legend><?= __('Edit Departmenttype') ?></legend>
        <?php
            echo $this->Form->input('depttypename');
            echo $this->Form->input('subtypeid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
