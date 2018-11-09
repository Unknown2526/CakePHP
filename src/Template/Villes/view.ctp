<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ville $ville
 */
$this->extend('/Layout/default');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ville'), ['action' => 'edit', $ville->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ville'), ['action' => 'delete', $ville->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ville->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Villes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ville'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="villes view large-9 medium-8 columns content">
    <h3><?= h($ville->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($ville->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ville->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pays Code') ?></th>
            <td><?= $this->Number->format($ville->pays_code) ?></td>
        </tr>
    </table>
</div>
