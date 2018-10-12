<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
$loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?php if($userrole === 'admin' && $userrole === 'proprietaire'){echo $this->Html->link(__('List Clients'), ['action' => 'index']);} ?></li>
        <li><?= $this->Html->link(__('List Hotels'), ['controller' => 'Hotels', 'action' => 'index']) ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New Hotel'), ['controller' => 'Hotels', 'action' => 'add']);} ?></li>
        <li><?php if($userrole === 'proprietaire'){echo $this->Html->link(__('New Hotel'), ['controller' => 'Hotels', 'action' => 'add']);} ?></li>
    </ul>
</nav>
<div class="clients form large-9 medium-8 columns content">
    <?= $this->Form->create($client) ?>
    <fieldset>
        <legend><?= __('Add Client') ?></legend>
        <?php
            echo $this->Form->control('client_nom');
            echo $this->Form->control('client_adresse');
            echo $this->Form->control('client_ville');
            echo $this->Form->control('client_phone');
            echo $this->Form->control('email');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('hotels._ids', ['options' => $hotels]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
