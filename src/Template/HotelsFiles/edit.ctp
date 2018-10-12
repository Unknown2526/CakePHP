<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HotelsFile $hotelsFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $hotelsFile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $hotelsFile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Hotels Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Hotels'), ['controller' => 'Hotels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hotel'), ['controller' => 'Hotels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hotelsFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($hotelsFile) ?>
    <fieldset>
        <legend><?= __('Edit Hotels File') ?></legend>
        <?php
            echo $this->Form->control('hotel_id', ['options' => $hotels]);
            echo $this->Form->control('file_id', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
