<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Coursecategory'), ['action' => 'edit', $coursecategory->categoryid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Coursecategory'), ['action' => 'delete', $coursecategory->categoryid], ['confirm' => __('Are you sure you want to delete # {0}?', $coursecategory->categoryid)]) ?> </li>
        <li><?= $this->Html->link(__('List Coursecategory'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coursecategory'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="coursecategory view large-9 medium-8 columns content">
    <h3><?= h($coursecategory->categoryid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Categoryname') ?></th>
            <td><?= h($coursecategory->categoryname) ?></td>
        </tr>
        <tr>
            <th><?= __('Categoryid') ?></th>
            <td><?= $this->Number->format($coursecategory->categoryid) ?></td>
        </tr>
        <tr>
            <th><?= __('Parentcategory') ?></th>
            <td><?= $this->Number->format($coursecategory->parentcategory) ?></td>
        </tr>
        <tr>
            <th><?= __('Ptestid') ?></th>
            <td><?= $this->Number->format($coursecategory->ptestid) ?></td>
        </tr>
        <tr>
            <th><?= __('Serviceid') ?></th>
            <td><?= $this->Number->format($coursecategory->serviceid) ?></td>
        </tr>
        <tr>
            <th><?= __('Departmentid') ?></th>
            <td><?= $this->Number->format($coursecategory->departmentid) ?></td>
        </tr>
    </table>
</div>
