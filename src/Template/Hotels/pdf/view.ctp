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
</div>