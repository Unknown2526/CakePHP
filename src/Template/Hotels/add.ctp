<?php
$this->extend('/Layout/default');
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Pays",
    "action" => "getPays",
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
$loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];
?>

<?php
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('List Hotels'), ['action' => 'index']) ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('List Pays'), ['controller' => 'Pays', 'action' => 'index']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New Pay'), ['controller' => 'Pays', 'action' => 'add']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']);} ?></li>
<?php
$this->end();

?>
<div class="dropdown hidden-xs">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?= __("Actions") ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <?= $this->fetch('tb_actions') ?>
    </ul>
</div>

<div class="hotels form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="paysController">
    <!--h3> Debug </h3>
    You have selected pay: <span ng-bind="villes.id"></span> <span ng-bind="villes.nom"></span><br/>
    and ville : <span ng-bind="ville.id"></span> <span ng-bind="ville.nom"></span>
    <pre ng-show='pays'>{{ pays | json }}</pre-->
    <?= $this->Form->create($hotel) ?>
    <fieldset>
        <legend><?= __('Add Hotel') ?></legend>
        <?php
            echo $this->Form->input('hotel_nom', ['id' => 'autocomplete']);
            echo $this->Form->control('hotel_adresse');
            echo $this->Form->control('hotel_codepostal');
            echo $this->Form->control('hotel_url');
        ?>
        <div>
        Pays: 
            <select size="1"
                    name="Pay_code"
                    id="pay-code" 
                    ng-model="pay" 
                    ng-options="pay.pays_nom for pay in pays track by pay.pays_code"
                    >
                <option value=''>Select</option>
            </select>
        </div>
        <div>
        Villes: 
            <select size="1"
                    name="ville_id"
                    id="ville-id" 
                    ng-disabled="!pay" 
                    ng-model="ville"
                    ng-options="ville.nom for ville in pay.villes track by ville.id"
                    >
                <option value=''>Select</option>
            </select>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>