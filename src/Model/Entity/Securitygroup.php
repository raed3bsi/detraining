<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Securitygroup Entity
 *
 * @property int $sgroupid
 * @property string $sgroupname
 * @property string $sgroupstatus
 * @property int $parent_id
 * @property int $sgtypeid
 *
 * @property \App\Model\Entity\ParentSecuritygroup $parent_securitygroup
 * @property \App\Model\Entity\ChildSecuritygroup[] $child_securitygroup
 */
class Securitygroup extends Entity
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
        'sgroupid' => false
    ];
}
