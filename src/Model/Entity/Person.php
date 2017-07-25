<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $personid
 * @property string $personname
 * @property string $email
 * @property \Cake\I18n\Time $dateofbirth
 * @property string $mobile
 * @property string $workphone
 * @property int $addressid
 * @property int $educationlevelid
 * @property string $gender
 * @property \Cake\I18n\Time $registrationdate
 * @property int $persontype
 */
class Person extends Entity
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
        'personid' => false
    ];
}
