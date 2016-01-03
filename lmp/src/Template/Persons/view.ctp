<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acties') ?></li>
        <li><?= $this->Html->link(__('Wijzig persoon'), ['action' => 'edit', $person->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Verwijder persoon'), ['action' => 'delete', $person->id], ['confirm' => __('Ben je zeker dat je deze persoon wil verwijderen: # {0}?', $person->id)]) ?> </li>
        <li><?= $this->Html->link(__('Lijst personen'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nieuwe persoon'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="persons view large-9 medium-8 columns content">
    <h3><?= h($person->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($person->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Naam') ?></th>
            <td><?= h($person->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Voornaam') ?></th>
            <td><?= h($person->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Adres') ?></th>
            <td><?= h($person->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Postcode') ?></th>
            <td><?= h($person->postcode) ?></td>
        </tr>
        <tr>
            <th><?= __('Stad') ?></th>
            <td><?= h($person->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Land') ?></th>
            <td><?= h($person->country) ?></td>
        </tr>
        <tr>
            <th><?= __('E-mailadres 1') ?></th>
            <td><?= h($person->email1) ?></td>
        </tr>
        <tr>
            <th><?= __('E-mailadres 2') ?></th>
            <td><?= h($person->email2) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefoonnummer') ?></th>
            <td><?= h($person->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Jaar afzwaai') ?></th>
            <td><?= h($person->year_stop) ?></td>
        </tr>
        <tr>
            <th><?= __('Geldig') ?></th>
            <td><?= $person->valid ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Opmerkingen') ?></h4>
        <?= $this->Text->autoParagraph(h($person->remarks)); ?>
    </div>
</div>
