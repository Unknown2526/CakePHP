<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hotel Entity
 *
 * @property int $hotel_id
 * @property string $hotel_nom
 * @property string $hotel_adresse
 * @property string $hotel_codepostal
 * @property string $hotel_ville
 * @property string $hotel_url
 * @property int $pays_code
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Pay $pay
 * @property \App\Model\Entity\File[] $files
 */
class Hotel extends Entity
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
        'hotel_nom' => true,
        'hotel_adresse' => true,
        'hotel_codepostal' => true,
        'ville_id' => true,
        'hotel_url' => true,
        'pays_code' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'pay' => true,
        'ville' => true,
        'files' => true
    ];
}
