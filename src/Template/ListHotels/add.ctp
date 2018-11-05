<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ListHotel $listHotel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List List Hotels'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="listHotels form large-9 medium-8 columns content">
    <?= $this->Form->create($listHotel) ?>
    <fieldset>
        <legend><?= __('Add List Hotel') ?></legend>
        <?php
            echo $this->Form->control('nom');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
