<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hotel[]|\Cake\Collection\CollectionInterface $hotels
 */
$this->extend('/Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
        <li><?= $this->Html->link(__('New Hotel'), ['action' => 'add']); ?></li>
        <?php $this->end(); ?>
        <?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th<?= $this->Paginator->sort('id'); ?></th>
            <th<?= $this->Paginator->sort('Name'); ?></th>
            <th<?= $this->Paginator->sort('Address'); ?></th>
            <th<?= $this->Paginator->sort('City'); ?></th>
            <th<?= $this->Paginator->sort('Url'); ?></th>
            <th<?= $this->Paginator->sort('created'); ?></th>
            <th<?= $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hotels as $hotel): ?>
        <tr>
                <td><?= $this->Number->format($hotel->hotel_id) ?></td>
                <td><?= h($hotel->hotel_nom) ?></td>
                <td><?= h($hotel->hotel_adresse) ?></td>
                <td><?= h($hotel->ville->nom) ?></td>
                <td><?= h($hotel->hotel_url) ?></td>
                <td><?= h($hotel->created) ?></td>
                <td><?= h($hotel->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('', ['action' => 'view', $hotel->hotel_id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    <?= $this->Html->link('', ['action' => 'edit', $hotel->hotel_id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $hotel->hotel_id], ['confirm' => __('Are you sure you want to delete # {0}?', $hotel->hotel_id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
