<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ville[]|\Cake\Collection\CollectionInterface $villes
 */
$this->extend('/Layout/default');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ville'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="villes index large-9 medium-8 columns content">
    <h3><?= __('Villes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pays_code') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($villes as $ville): ?>
            <tr>
                <td><?= $this->Number->format($ville->id) ?></td>
                <td><?= h($ville->nom) ?></td>
                <td><?= $this->Number->format($ville->pays_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ville->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ville->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ville->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ville->id)]) ?>
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
