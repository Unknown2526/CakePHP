<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pay[]|\Cake\Collection\CollectionInterface $pays
 */
$loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New Pay'), ['action' => 'add']);} ?></li>
    </ul>
</nav>
<div class="pays index large-9 medium-8 columns content">
    <h3><?= __('Pays') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('pays_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('devise') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pays as $pay): ?>
            <tr>
                <td><?= $this->Number->format($pay->pays_code) ?></td>
                <td><?= h($pay->pays_devise) ?></td>
                <td><?= h($pay->pays_nom) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pay->pays_code]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pay->pays_code]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pay->pays_code], ['confirm' => __('Are you sure you want to delete # {0}?', $pay->pays_code)]) ?>
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
