<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Materialtype'), ['action' => 'edit', $materialtype->mtypeid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Materialtype'), ['action' => 'delete', $materialtype->mtypeid], ['confirm' => __('Are you sure you want to delete # {0}?', $materialtype->mtypeid)]) ?> </li>
        <li><?= $this->Html->link(__('List Materialtype'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Materialtype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materialtype view large-9 medium-8 columns content">
    <h3><?= h($materialtype->mtypeid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mtypename') ?></th>
            <td><?= h($materialtype->mtypename) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mtypeid') ?></th>
            <td><?= $this->Number->format($materialtype->mtypeid) ?></td>
        </tr>
    </table>
</div>
