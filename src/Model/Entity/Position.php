<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Position Entity
 *
 * @property int $positionid
 * @property string $positionname
 * @property int $sgroupid
 * @property int $jobid
 * @property int $businessunitid
 * @property int $maxnoinstances
 *
 * @property \App\Model\Entity\Securitygroup $securitygroup
 */
class Position extends Entity
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
        'positionid' => false
    ];
}
