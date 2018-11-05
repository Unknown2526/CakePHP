<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Villes",
    "action" => "getByPays",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Hotels/add', ['block' => 'scriptBottom']);
?>
<?php
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
$loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Hotels'), ['action' => 'index']) ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('List Pays'), ['controller' => 'Pays', 'action' => 'index']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New Pay'), ['controller' => 'Pays', 'action' => 'add']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']);} ?></li>
    </ul>
</nav>
<div class="hotels form large-9 medium-8 columns content">
    <?= $this->Form->create($hotel) ?>
    <fieldset>
        <legend><?= __('Add Hotel') ?></legend>
        <?php
            echo $this->Form->input('hotel_nom', ['id' => 'autocomplete']);
            echo $this->Form->control('hotel_adresse');
            echo $this->Form->control('hotel_codepostal');
            echo $this->Form->control('hotel_url');
            echo $this->Form->control('pays_code', ['options' => $pays]);
            echo $this->Form->control('ville_id', ['options' => $villes]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('file_name', ['type' => 'file']);
            //echo $this->Form->control('files._ids', ['options' => $files]);
            //echo $this->Form->control('file_name', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
