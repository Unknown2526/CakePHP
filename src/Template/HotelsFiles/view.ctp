<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HotelsFile $hotelsFile
 */
$this->extend('/Layout/default');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hotels File'), ['action' => 'edit', $hotelsFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hotels File'), ['action' => 'delete', $hotelsFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hotelsFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hotels Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hotels File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hotels'), ['controller' => 'Hotels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hotel'), ['controller' => 'Hotels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="hotelsFiles view large-9 medium-8 columns content">
    <h3><?= h($hotelsFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Hotel') ?></th>
            <td><?= $hotelsFile->has('hotel') ? $this->Html->link($hotelsFile->hotel->hotel_id, ['controller' => 'Hotels', 'action' => 'view', $hotelsFile->hotel->hotel_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $hotelsFile->has('file') ? $this->Html->link($hotelsFile->file->id, ['controller' => 'Files', 'action' => 'view', $hotelsFile->file->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($hotelsFile->id) ?></td>
        </tr>
    </table>
</div>
