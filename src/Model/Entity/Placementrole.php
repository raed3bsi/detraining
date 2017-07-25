<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Placementrole Entity
 *
 * @property int $roleid
 * @property int $ptestid
 * @property int $courseid
 * @property float $mingrade
 * @property float $maxgrade
 */
class Placementrole extends Entity
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
        'roleid' => false
    ];
}
