<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hotel[]|\Cake\Collection\CollectionInterface $hotels
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Hotel'), ['action' => 'add']) ?></li>
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
<div class="hotels index large-9 medium-8 columns content">
    <h3><?= __('Hotels') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('hotel_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hotel_nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hotel_adresse') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hotel_codepostal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hotel_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pays_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ville_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listHotels_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hotels as $hotel): ?>
            <tr>
                <td><?= $this->Number->format($hotel->hotel_id) ?></td>
                <td><?= h($hotel->hotel_nom) ?></td>
                <td><?= h($hotel->hotel_adresse) ?></td>
                <td><?= h($hotel->hotel_codepostal) ?></td>
                <td><?= h($hotel->hotel_url) ?></td>
                <td><?= $hotel->has('pay') ? $this->Html->link($hotel->pay->pays_nom, ['controller' => 'Pays', 'action' => 'view', $hotel->pay->pays_code]) : '' ?></td>
                <td><?= $hotel->has('ville') ? $this->Html->link($hotel->ville->nom, ['controller' => 'Villes', 'action' => 'view', $hotel->ville->id]) : '' ?></td>
                <td><?= $hotel->has('user') ? $this->Html->link($hotel->user->user_id, ['controller' => 'Users', 'action' => 'view', $hotel->user->user_id]) : '' ?></td>
                <td><?= $this->Number->format($hotel->listHotels_id) ?></td>
                <td><?= h($hotel->created) ?></td>
                <td><?= h($hotel->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $hotel->hotel_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $hotel->hotel_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hotel->hotel_id], ['confirm' => __('Are you sure you want to delete # {0}?', $hotel->hotel_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
