<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ville $ville
 */
$this->extend('/Layout/default');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ville->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ville->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Villes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="villes form large-9 medium-8 columns content">
    <?= $this->Form->create($ville) ?>
    <fieldset>
        <legend><?= __('Edit Ville') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('pays_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
