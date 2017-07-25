<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BusinessunitPosition Entity
 *
 * @property int $positionid
 * @property int $businessunitid
 * @property int $personid
 * @property int $businessunitpositionid
 * @property int $sgroupid
 */
class BusinessunitPosition extends Entity
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
        '*' => true,
        'businessunitpositionid' => false
    ];
}
