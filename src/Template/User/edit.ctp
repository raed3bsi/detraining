<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->userid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->userid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="user form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('personid');
            echo $this->Form->input('emailactivation');
            echo $this->Form->input('mobileactivation');
            echo $this->Form->input('password');
            echo $this->Form->input('userstatus');
            echo $this->Form->input('forcechangepassword');
            echo $this->Form->input('email');
            echo $this->Form->input('mobile');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
