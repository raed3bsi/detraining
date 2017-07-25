<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fieldofstudy'), ['action' => 'edit', $fieldofstudy->fieldofstudyid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fieldofstudy'), ['action' => 'delete', $fieldofstudy->fieldofstudyid], ['confirm' => __('Are you sure you want to delete # {0}?', $fieldofstudy->fieldofstudyid)]) ?> </li>
        <li><?= $this->Html->link(__('List Fieldofstudy'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fieldofstudy'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fieldofstudy view large-9 medium-8 columns content">
    <h3><?= h($fieldofstudy->fieldofstudyid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Fieldofstudyname') ?></th>
            <td><?= h($fieldofstudy->fieldofstudyname) ?></td>
        </tr>
        <tr>
            <th><?= __('Fieldofstudyid') ?></th>
            <td><?= $this->Number->format($fieldofstudy->fieldofstudyid) ?></td>
        </tr>
    </table>
</div>
