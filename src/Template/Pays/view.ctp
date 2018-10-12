<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pay $pay
 */
$loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('Edit Pay'), ['action' => 'edit', $pay->pays_code]);} ?> </li>
        <li><?php if($userrole === 'admin'){echo $this->Form->postLink(__('Delete Pay'), ['action' => 'delete', $pay->pays_code], ['confirm' => __('Are you sure you want to delete # {0}?', $pay->pays_code)]);} ?> </li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('List Pays'), ['action' => 'index']);} ?> </li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('New Pay'), ['action' => 'add']);} ?> </li>
    </ul>
</nav>
<div class="pays view large-9 medium-8 columns content">
    <h3><?= h($pay->pays_code) ?></h3>
    <div class="row">
        <h4><?= __('Pays Devise') ?></h4>
        <?= $this->Text->autoParagraph(h($pay->pays_devise)); ?>
    </div>
    <div class="row">
        <h4><?= __('Pays Nom') ?></h4>
        <?= $this->Text->autoParagraph(h($pay->pays_nom)); ?>
    </div>
</div>
