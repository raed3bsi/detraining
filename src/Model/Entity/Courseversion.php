<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Courseversion Entity
 *
 * @property int $courseid
 * @property int $versionid
 * @property int $versionseq
 * @property string $versionname
 * @property string $coursedescription
 * @property string $courseobjectives
 * @property string $coursegoals
 * @property int $serviceid
 * @property int $documentid
 * @property int $createdby
 * @property int $versionstatus
 * @property int $traininghours
 */
class Courseversion extends Entity
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
        'versionid' => false
    ];
}
