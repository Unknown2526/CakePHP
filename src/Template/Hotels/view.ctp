<?php
$this->extend('/Layout/default');
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hotel $hotel
 */
$loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Html->link(__('Edit Hotel'), ['action' => 'edit', $hotel->hotel_id]);} ?></li>
        <li><?php if($userrole === 'admin'){echo $this->Form->postLink(__('Delete Hotel'), ['action' => 'delete', $hotel->hotel_id], ['confirm' => __('Are you sure you want to delete # {0}?', $hotel->hotel_id)]);} ?></li>
        <!--<li><?= $this->Form->postLink(__('Delete Hotel'), ['action' => 'delete', $hotel->hotel_id], ['confirm' => __('Are you sure you want to delete # {0}?', $hotel->hotel_id)]) ?> </li>-->
        <li><?= $this->Html->link(__('List Hotels'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="hotels view large-9 medium-8 columns content">
    <h3><?= h($hotel->hotel_nom) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($hotel->hotel_nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($hotel->hotel_adresse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postal code') ?></th>
            <td><?= h($hotel->hotel_codepostal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($hotel->ville->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($hotel->hotel_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $hotel->has('pay') ? $hotel->pay->pays_nom : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $hotel->has('user') ? $this->Html->link($hotel->user->email, ['controller' => 'Users', 'action' => 'view', $hotel->user->user_id]) : '' ?></td>
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
</div>
