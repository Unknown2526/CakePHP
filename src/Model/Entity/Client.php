<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $client_id
 * @property string $client_nom
 * @property string $client_adresse
 * @property string $client_ville
 * @property string $client_phone
 * @property string $email
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Hotel[] $hotels
 */
class Client extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'client_nom' => true,
        'client_adresse' => true,
        'client_ville' => true,
        'client_phone' => true,
        'email' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'hotels' => true
    ];
}
