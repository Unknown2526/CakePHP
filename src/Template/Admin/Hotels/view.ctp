<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hotel $hotel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hotel'), ['action' => 'edit', $hotel->hotel_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hotel'), ['action' => 'delete', $hotel->hotel_id], ['confirm' => __('Are you sure you want to delete # {0}?', $hotel->hotel_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hotels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hotel'), ['action' => 'add']) ?> </li>
        <!--<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List List Hotels'), ['controller' => 'ListHotels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New List Hotel'), ['controller' => 'ListHotels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pays'), ['controller' => 'Pays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay'), ['controller' => 'Pays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Villes'), ['controller' => 'Villes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ville'), ['controller' => 'Villes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>-->
    </ul>
</nav>
<div class="hotels view large-9 medium-8 columns content">
    <h3><?= h($hotel->hotel_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Hotel Nom') ?></th>
            <td><?= h($hotel->hotel_nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hotel Adresse') ?></th>
            <td><?= h($hotel->hotel_adresse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hotel Codepostal') ?></th>
            <td><?= h($hotel->hotel_codepostal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hotel Url') ?></th>
            <td><?= h($hotel->hotel_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pay') ?></th>
            <td><?= $hotel->has('pay') ? $this->Html->link($hotel->pay->pays_nom, ['controller' => 'Pays', 'action' => 'view', $hotel->pay->pays_code]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ville') ?></th>
            <td><?= $hotel->has('ville') ? $this->Html->link($hotel->ville->nom, ['controller' => 'Villes', 'action' => 'view', $hotel->ville->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $hotel->has('user') ? $this->Html->link($hotel->user->user_id, ['controller' => 'Users', 'action' => 'view', $hotel->user->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hotels Hotel Ville Translation') ?></th>
            <td><?= $hotel->has('hotel_ville_translation') ? $this->Html->link($hotel->hotel_ville_translation->id, ['controller' => 'Hotels_hotel_ville_translation', 'action' => 'view', $hotel->hotel_ville_translation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hotel Id') ?></th>
            <td><?= $this->Number->format($hotel->hotel_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ListHotels Id') ?></th>
            <td><?= $this->Number->format($hotel->listHotels_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($hotel->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($hotel->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clients') ?></h4>
        <?php if (!empty($hotel->clients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Client Id') ?></th>
                <th scope="col"><?= __('Client Nom') ?></th>
                <th scope="col"><?= __('Client Adresse') ?></th>
                <th scope="col"><?= __('Client Ville') ?></th>
                <th scope="col"><?= __('Client Phone') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($hotel->clients as $clients): ?>
            <tr>
                <td><?= h($clients->client_id) ?></td>
                <td><?= h($clients->client_nom) ?></td>
                <td><?= h($clients->client_adresse) ?></td>
                <td><?= h($clients->client_ville) ?></td>
                <td><?= h($clients->client_phone) ?></td>
                <td><?= h($clients->email) ?></td>
                <td><?= h($clients->user_id) ?></td>
                <td><?= h($clients->created) ?></td>
                <td><?= h($clients->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clients', 'action' => 'view', $clients->client_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clients', 'action' => 'edit', $clients->client_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clients', 'action' => 'delete', $clients->client_id], ['confirm' => __('Are you sure you want to delete # {0}?', $clients->client_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Files') ?></h4>
        <?php if (!empty($hotel->files)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('File Name') ?></th>
                <th scope="col"><?= __('File Path') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($hotel->files as $files): ?>
            <tr>
                <td><?= h($files->id) ?></td>
                <td><?= h($files->file_name) ?></td>
                <td><?= h($files->file_path) ?></td>
                <td><?= h($files->created) ?></td>
                <td><?= h($files->modified) ?></td>
                <td><?= h($files->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Files', 'action' => 'view', $files->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Files', 'action' => 'edit', $files->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Files', 'action' => 'delete', $files->id], ['confirm' => __('Are you sure you want to delete # {0}?', $files->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related I18n') ?></h4>
        <?php if (!empty($hotel->_i18n)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Locale') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Field') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($hotel->_i18n as $i18n): ?>
            <tr>
                <td><?= h($i18n->id) ?></td>
                <td><?= h($i18n->locale) ?></td>
                <td><?= h($i18n->model) ?></td>
                <td><?= h($i18n->foreign_key) ?></td>
                <td><?= h($i18n->field) ?></td>
                <td><?= h($i18n->content) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'I18n', 'action' => 'view', $i18n->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'I18n', 'action' => 'edit', $i18n->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'I18n', 'action' => 'delete', $i18n->id], ['confirm' => __('Are you sure you want to delete # {0}?', $i18n->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
