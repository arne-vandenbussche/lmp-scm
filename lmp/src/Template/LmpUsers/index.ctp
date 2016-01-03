<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lmp User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lmpUsers index large-9 medium-8 columns content">
    <h3><?= __('Lmp Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('lastName') ?></th>
                <th><?= $this->Paginator->sort('firstName') ?></th>
                <th><?= $this->Paginator->sort('userName') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('password') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lmpUsers as $lmpUser): ?>
            <tr>
                <td><?= $this->Number->format($lmpUser->id) ?></td>
                <td><?= h($lmpUser->lastName) ?></td>
                <td><?= h($lmpUser->firstName) ?></td>
                <td><?= h($lmpUser->userName) ?></td>
                <td><?= h($lmpUser->email) ?></td>
                <td><?= h($lmpUser->password) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lmpUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lmpUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lmpUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lmpUser->id)]) ?>
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
