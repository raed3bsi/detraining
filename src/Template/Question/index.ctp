<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Question types') ?></li>
        <?php foreach ($qtypes as $qt):?>
        <li><?= $this->Html->link(__($qt->qtypename), ['action' => 'add',$qt->qtypeid]) ?></li>
        <?php endforeach;?>
    </ul>
</nav>
<div class="question index large-9 medium-8 columns content">
    <h3><?= __('Question') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('questionid') ?></th>
                <th><?= $this->Paginator->sort('parent_questionid') ?></th>
                <th><?= $this->Paginator->sort('difficultyid') ?></th>
                <th><?= $this->Paginator->sort('questiondescription') ?></th>
                <th><?= $this->Paginator->sort('qtypeid') ?></th>
                <th><?= $this->Paginator->sort('topicid') ?></th>
                <th><?= $this->Paginator->sort('points') ?></th>
                <th><?= $this->Paginator->sort('negativepoints') ?></th>
                <th><?= $this->Paginator->sort('pointsfactor') ?></th>
                <th><?= $this->Paginator->sort('owner') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($question as $question): ?>
            <tr>
                <td><?= $this->Number->format($question->questionid) ?></td>
                <td><?= $this->Number->format($question->parent_questionid) ?></td>
                <td><?= $this->Number->format($question->difficultyid) ?></td>
                <td><?= h($question->questiondescription) ?></td>
                <td><?= $this->Number->format($question->qtypeid) ?></td>
                <td><?= $this->Number->format($question->topicid) ?></td>
                <td><?= $this->Number->format($question->points) ?></td>
                <td><?= $this->Number->format($question->negativepoints) ?></td>
                <td><?= h($question->pointsfactor) ?></td>
                <td><?= $this->Number->format($question->owner) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $question->questionid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $question->questionid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $question->questionid], ['confirm' => __('Are you sure you want to delete # {0}?', $question->questionid)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
