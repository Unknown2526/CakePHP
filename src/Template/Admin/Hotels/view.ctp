<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hotel $hotel
 */
$this->extend('/Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Hotel'), ['action' => 'edit', $hotel->hotel_id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Hotel'), ['action' => 'delete', $hotel->hotel_id], ['confirm' => __('Are you sure you want to delete # {0}?', $hotel->hotel_id)]) ?> </li>
<li><?= $this->Html->link(__('List Hotels'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Hotel'), ['action' => 'add']) ?> </li>
<li><?=
    $this->Html->link('Section publique en JS', [
            'prefix' => false,
            'controller' => 'Pays',
            'action' => 'index'
            ]);
            ?>
</li>
<?php
$this->end();
$this->start('tb_sidebar');
?>
<div class="dropdown hidden-xs">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?= __("Actions") ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <?= $this->fetch('tb_actions') ?>
    </ul>
</div>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($hotel->hotel_nom) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($hotel->hotel_nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($hotel->hotel_adresse) ?></td>
        </tr>
        <tr>
            <th><?= __('Postal code') ?></th>
            <td><?= h($hotel->hotel_codepostal) ?></td>
        </tr>
        <tr>
            <th><?= __('Url') ?></th>
            <td><?= h($hotel->hotel_url) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($hotel->ville->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= $hotel->has('pay') ? $hotel->pay->pays_nom : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $hotel->has('user') ? $hotel->user->email : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($hotel->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($hotel->modified) ?></td>
        </tr>
    </table>
</div>

<div class="related">
        <h4><?= __('Related Files') ?></h4>
        <?php if (!empty($hotel->files)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Image') ?></th>
               </tr>
                <?php foreach ($hotel->files as $files): ?>
                    <tr>
                        <td>
                            <?php
                            echo $this->Html->image($files->file_path . $files->file_name, [
                                "alt" => $files->file_name,
                            ]);
                            ?>
                        </td>
                    </tr>
            <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>