<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Permission Entity
 *
 * @property int $permissionid
 * @property string $permissionname
 * @property int $pgroupid
 *
 * @property \App\Model\Entity\Permission $parent_permission
 * @property \App\Model\Entity\Permission[] $child_permission
 * @property \App\Model\Entity\Appaction $action
 * @property \App\Model\Entity\Appmodel $amodel
 */
class Permission extends Entity
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
        'permissionid' => false
    ];
}
