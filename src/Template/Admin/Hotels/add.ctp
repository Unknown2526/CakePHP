<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hotel $hotel
 */
$this->extend('/Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
        <li><?= $this->Html->link(__('List Hotels'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
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
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('file_name', ['type' => 'file']);
        ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

