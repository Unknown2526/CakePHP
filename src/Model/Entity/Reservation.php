<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $reserv_id
 * @property \Cake\I18n\FrozenDate $date_de
 * @property \Cake\I18n\FrozenDate $date_a
 * @property int $nb_chambre
 * @property int $client_id
 * @property int $hotel_id
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Hotel $hotel
 */
class Reservation extends Entity
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
        'date_de' => true,
        'date_a' => true,
        'nb_chambre' => true,
        'client_id' => true,
        'hotel_id' => true,
        'client' => true,
        'hotel' => true
    ];
}
