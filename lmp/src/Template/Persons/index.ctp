<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acties') ?></li>
        <li><?= $this->Html->link(__('Nieuwe persoon'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="persons index large-9 medium-8 columns content">
    <h3><?= __('Oud-leiding') ?></h3>
    <table cellpadding="0" cellspacing="0" id="personTable">
        <thead>
            <tr>
                <th style="display:none;"><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name','Naam') ?></th>
                <th><?= $this->Paginator->sort('first_name', 'Voornaam') ?></th>
                <th><?= $this->Paginator->sort('email1','E-maildadres') ?></th>
                <th><?= $this->Paginator->sort('valid','Geldig') ?></th>
                <th class="actions"><?= __('Acties') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($persons as $person): ?>
            <tr>
                <td style="display:none;"><?= $this->Number->format($person->id) ?></td>
                <td><?= h($person->name) ?></td>
                <td><?= h($person->first_name) ?></td>
                <td><?= h($person->email1) ?></td>
                <td><?= h($person->valid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Bekijk'), ['action' => 'view', $person->id]) ?>
                    <?= $this->Html->link(__('Wijzig'), ['action' => 'edit', $person->id]) ?>
                    <?= $this->Form->postLink(__('Verwijder'), ['action' => 'delete', $person->id], ['confirm' => __('Ben je zeker dat je deze wil verwijderen: # {0}?', $person->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('vorige')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('volgende') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter('Pagina {{page}} van {{pages}}') ?></p>
    </div>
</div>
