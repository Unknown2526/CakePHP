<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ListHotel $listHotel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit List Hotel'), ['action' => 'edit', $listHotel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete List Hotel'), ['action' => 'delete', $listHotel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $listHotel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List List Hotels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New List Hotel'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="listHotels view large-9 medium-8 columns content">
    <h3><?= h($listHotel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($listHotel->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($listHotel->id) ?></td>
        </tr>
    </table>
</div>
