<?php
$this->extend('/Layout/default');
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Villes",
    "action" => "getByPays",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Hotels/add', ['block' => 'scriptBottom']);

$urlToHotelsAutocompletedemoJson = $this->Url->build([
    "controller" => "Hotels",
    "action" => "findHotels",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToHotelsAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Hotels/autocompletedemo', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hotel $hotel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $hotel->hotel_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $hotel->hotel_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Hotels'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="hotels form large-9 medium-8 columns content">
    <?= $this->Form->create($hotel) ?>
    <fieldset>
        <legend><?= __('Edit Hotel') ?></legend>
        <?php
            echo $this->Form->control('hotel_nom', ['id' => 'autocomplete']);
            echo $this->Form->control('hotel_adresse');
            echo $this->Form->control('hotel_codepostal');
            echo $this->Form->control('hotel_url');
            echo $this->Form->control('pays_code', ['options' => $pays]);
            echo $this->Form->control('ville_id', ['options' => $villes]);
            //echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->hidden('user_id');
            echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
