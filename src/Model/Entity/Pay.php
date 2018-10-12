<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pay Entity
 *
 * @property int $pays_code
 * @property string $pays_devise
 * @property string $pays_nom
 *
 * @property \App\Model\Entity\PaysPaysNomTranslation $pays_nom_translation
 * @property \App\Model\Entity\I18n[] $_i18n
 */
class Pay extends Entity
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
        'pays_devise' => true,
        'pays_nom' => true,
        'pays_nom_translation' => true,
        '_i18n' => true
    ];
}
