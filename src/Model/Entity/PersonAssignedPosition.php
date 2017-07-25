<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PersonAssignedPosition Entity
 *
 * @property int $id
 * @property int $personid
 * @property int $positionid
 * @property \Cake\I18n\Time $validfrom
 * @property \Cake\I18n\Time $validuntil
 * @property string $assignmentstatus
 * @property \Cake\I18n\Time $activatedon
 * @property \Cake\I18n\Time $invalidatedon
 */
class PersonAssignedPosition extends Entity
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
        'id' => false
    ];
}
