<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $placementtest->ptestid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $placementtest->ptestid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Placementtest'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="placementtest form large-9 medium-8 columns content">
    <?= $this->Form->create($placementtest) ?>
    <fieldset>
        <legend><?= __('Edit Placementtest') ?></legend>
        <?php
            echo $this->Form->input('evaltestid');
            echo $this->Form->input('ptestnumber');
            echo $this->Form->input('pteststatus');
            echo $this->Form->input('documentid');
            echo $this->Form->input('createdby');
            echo $this->Form->input('serviceid');
            echo $this->Form->input('ptestname');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
