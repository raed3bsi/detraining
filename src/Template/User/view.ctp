<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->userid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->userid], ['confirm' => __('Are you sure you want to delete # {0}?', $user->userid)]) ?> </li>
        <li><?= $this->Html->link(__('List User'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="user view large-9 medium-8 columns content">
    <h3><?= h($user->userid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Mobile') ?></th>
            <td><?= h($user->mobile) ?></td>
        </tr>
        <tr>
            <th><?= __('Userid') ?></th>
            <td><?= $this->Number->format($user->userid) ?></td>
        </tr>
        <tr>
            <th><?= __('Personid') ?></th>
            <td><?= $this->Number->format($user->personid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Emailactivation') ?></h4>
        <?= $this->Text->autoParagraph(h($user->emailactivation)); ?>
    </div>
    <div class="row">
        <h4><?= __('Mobileactivation') ?></h4>
        <?= $this->Text->autoParagraph(h($user->mobileactivation)); ?>
    </div>
    <div class="row">
        <h4><?= __('Userstatus') ?></h4>
        <?= $this->Text->autoParagraph(h($user->userstatus)); ?>
    </div>
    <div class="row">
        <h4><?= __('Forcechangepassword') ?></h4>
        <?= $this->Text->autoParagraph(h($user->forcechangepassword)); ?>
    </div>
</div>
