<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Placementtest Entity
 *
 * @property int $ptestid
 * @property int $evaltestid
 * @property string $ptestnumber
 * @property int $pteststatus
 * @property int $documentid
 * @property int $createdby
 * @property int $serviceid
 * @property string $ptestname
 */
class Placementtest extends Entity
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
        'ptestid' => false
    ];
}
