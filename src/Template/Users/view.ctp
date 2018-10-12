<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('Edit User'), ['action' => 'edit', $user->user_id]);} ?> </li>
        <li><?php if($userrole === 'admin'){echo $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id)]);} ?> </li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('List Users'), ['action' => 'index']);} ?> </li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New User'), ['action' => 'add']);} ?> </li>
        <li><?= $this->Html->link(__('List Hotels'), ['controller' => 'Hotels', 'action' => 'index']) ?> </li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New Hotel'), ['controller' => 'Hotels', 'action' => 'add']);} ?> </li>
        <li><?php if($userrole === 'proprietaire'){echo $this->Html->link(__('New Hotel'), ['controller' => 'Hotels', 'action' => 'add']);} ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('Role Id') ?></th>
            <td><?= h($user->role_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Hotels') ?></h4>
        <?php if (!empty($user->hotels)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Hotel Nom') ?></th>
                <th scope="col"><?= __('Hotel Adresse') ?></th>
                <th scope="col"><?= __('Hotel Codepostal') ?></th>
                <th scope="col"><?= __('Hotel Ville') ?></th>
                <th scope="col"><?= __('Hotel Url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->hotels as $hotels): ?>
            <tr>
                <td><?= h($hotels->hotel_nom) ?></td>
                <td><?= h($hotels->hotel_adresse) ?></td>
                <td><?= h($hotels->hotel_codepostal) ?></td>
                <td><?= h($hotels->hotel_ville) ?></td>
                <td><?= h($hotels->hotel_url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Hotels', 'action' => 'view', $hotels->hotel_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Hotels', 'action' => 'edit', $hotels->hotel_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Hotels', 'action' => 'delete', $hotels->hotel_id], ['confirm' => __('Are you sure you want to delete # {0}?', $hotels->hotel_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
