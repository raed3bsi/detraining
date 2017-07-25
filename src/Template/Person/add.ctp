<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Person'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="person form large-9 medium-8 columns content">
    <?= $this->Form->create($person) ?>
    <fieldset>
        <legend><?= __('Add Person') ?></legend>
        <?php
            echo $this->Form->input('personname');
            echo $this->Form->input('email');
            echo $this->Form->input('dateofbirth', ['empty' => true]);
            echo $this->Form->input('mobile');
            echo $this->Form->input('workphone');
            echo $this->Form->input('addressid');
            echo $this->Form->input('educationlevelid');
            echo $this->Form->input('gender');
            echo $this->Form->input('registrationdate', ['empty' => true]);
            echo $this->Form->input('persontype');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
