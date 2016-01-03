<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acties') ?></li>
        <li><?= $this->Form->postLink(
                __('Verwijder'),
                ['action' => 'delete', $person->id],
                ['confirm' => __('Ben je zeker dat je deze wil verwijderen: # {0}?', $person->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lijst personen'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="persons form large-9 medium-8 columns content">
    <?= $this->Form->create($person) ?>
    <fieldset>
        <legend><?= __('Wijzig Persoon') ?></legend>
        <?php
            echo $this->Form->input('name', ['label' => __('Naam')]);
            echo $this->Form->input('first_name', ['label' => __('Voornaam')]);
            echo $this->Form->input('address', ['label' => __('Adres')]);
            echo $this->Form->input('postcode', ['label' => __('Postcode')]);
            echo $this->Form->input('city', ['label' => __('Gemeente')]);
            echo $this->Form->input('country', ['label' => __('Land')]);
            echo $this->Form->input('email1',['type' => 'email', 'label' => __('E-mailadres')]);
            echo $this->Form->input('email2', ['type' => 'email', 'label' => __('E-mailadres')]);
            echo $this->Form->input('phone', ['label' => __('Telefoon')]);
            echo $this->Form->input('year_stop', ['label' => __('Jaar afzwaai')]);
            echo $this->Form->input('remarks', ['label' => __('Opmerkingen')]);
            echo $this->Form->input('valid', ['label' => __('Geldig')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Bewaar')) ?>
    <?= $this->Form->end() ?>
</div>
