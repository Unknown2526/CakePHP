<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hotel[]|\Cake\Collection\CollectionInterface $hotels
 */
$loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New Hotel'), ['action' => 'add']);} ?></li>
        <li><?php if($userrole === 'proprietaire'){echo $this->Html->link(__('New Hotel'), ['action' => 'add']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New Users'), ['controller' => 'Users', 'action' => 'add']);} ?></li>
        <li><?php if($userrole !== null && $userrole !== 'client'){echo $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']);} ?></li>
        <li><?php if($userrole === null){echo $this->Html->link(__('New Clients'), ['controller' => 'Clients', 'action' => 'add']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('List Pays'), ['controller' => 'Pays', 'action' => 'index']);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']);} ?></li>
        <li><?php if($userrole === 'proprietaire'){echo $this->Html->link(__('New Files'), ['controller' => 'Files', 'action' => 'add']);} ?></li>
    </ul>
</nav>
<div class="hotels index large-9 medium-8 columns content">
    <h3><?= __('Hotels') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('hotel_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('City') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Url') ?></th>
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
                <td><?= h($hotel->hotel_ville) ?></td>
                <td><?= h($hotel->hotel_url) ?></td>
                <td><?= h($hotel->created) ?></td>
                <td><?= h($hotel->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $hotel->hotel_id]) ?>
                    <?php if ($userrole === "admin" || $userrole === "proprietaire"): ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $hotel->hotel_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hotel->hotel_id], ['confirm' => __('Are you sure you want to delete # {0}?', $hotel->hotel_id)]) ?>
                    <?php endif; ?>
                    <?php if ($userrole === "client"): ?>
                            <?= $this->Html->link(__('Reserver'), ['action' => 'reserver', $hotel->hotel_id]) ?>
                    <?php endif; ?>
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
