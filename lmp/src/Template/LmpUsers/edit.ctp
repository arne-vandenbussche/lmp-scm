<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lmpUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lmpUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Lmp Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="lmpUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($lmpUser) ?>
    <fieldset>
        <legend><?= __('Edit Lmp User') ?></legend>
        <?php
            echo $this->Form->input('lastName');
            echo $this->Form->input('firstName');
            echo $this->Form->input('userName');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
