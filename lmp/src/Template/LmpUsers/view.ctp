<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lmp User'), ['action' => 'edit', $lmpUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lmp User'), ['action' => 'delete', $lmpUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lmpUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lmp Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lmp User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lmpUsers view large-9 medium-8 columns content">
    <h3><?= h($lmpUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('LastName') ?></th>
            <td><?= h($lmpUser->lastName) ?></td>
        </tr>
        <tr>
            <th><?= __('FirstName') ?></th>
            <td><?= h($lmpUser->firstName) ?></td>
        </tr>
        <tr>
            <th><?= __('UserName') ?></th>
            <td><?= h($lmpUser->userName) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($lmpUser->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($lmpUser->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($lmpUser->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Role') ?></h4>
        <?= $this->Text->autoParagraph(h($lmpUser->role)); ?>
    </div>
</div>
