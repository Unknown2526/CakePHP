<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pay $pay
 */
$this->extend('/Layout/default');
$loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pay->pays_code],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pay->pays_code)]
        );}
        ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('List Pays'), ['action' => 'index']);} ?></li>
    </ul>
</nav>
<div class="pays form large-9 medium-8 columns content">
    <?= $this->Form->create($pay) ?>
    <fieldset>
        <legend><?= __('Edit Pay') ?></legend>
        <?php
            echo $this->Form->control('pays_devise');
            echo $this->Form->control('pays_nom');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
