<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hotel $hotel
 */
$this->extend('/Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
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
        <!--<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List List Hotels'), ['controller' => 'ListHotels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New List Hotel'), ['controller' => 'ListHotels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pays'), ['controller' => 'Pays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pay'), ['controller' => 'Pays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Villes'), ['controller' => 'Villes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ville'), ['controller' => 'Villes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="hotels form large-9 medium-8 columns content">
    <?= $this->Form->create($hotel) ?>
    <fieldset>
        <legend><?= __('Edit Hotel') ?></legend>
        <?php
            echo $this->Form->control('hotel_nom');
            echo $this->Form->control('hotel_adresse');
            echo $this->Form->control('hotel_codepostal');
            echo $this->Form->control('hotel_url');
            echo $this->Form->control('pays_code', ['options' => $pays]);
            echo $this->Form->control('ville_id', ['options' => $villes, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('listHotels_id');
            echo $this->Form->control('clients._ids', ['options' => $clients]);
            echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $hotel->hotel_id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $hotel->hotel_id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Hotels'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $hotel->hotel_id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $hotel->hotel_id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Hotels'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($hotel); ?>
<fieldset>
        <legend><?= __('Add Hotel') ?></legend>
        <?php
            
            echo $this->Form->input('hotel_nom', ['id' => 'autocomplete']);
            echo $this->Form->control('hotel_adresse');
            echo $this->Form->control('hotel_codepostal');
            echo $this->Form->control('hotel_url');
            echo $this->Form->control('pays_code', ['options' => $pays]);
            echo $this->Form->control('ville_id', ['options' => $villes]);
            echo $this->Form->hidden('user_id');
            echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
