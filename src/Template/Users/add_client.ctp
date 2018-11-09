<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->extend('/Layout/default');
$loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('List Users'), ['action' => 'index']);} ?></li>
        <!--<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>-->
        <li><?= $this->Html->link(__('List Hotels'), ['controller' => 'Hotels', 'action' => 'index']) ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New Hotel'), ['controller' => 'Hotels', 'action' => 'add']);} ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
