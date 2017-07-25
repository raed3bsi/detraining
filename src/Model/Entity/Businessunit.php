<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Businessunit Entity
 *
 * @property int $businessunitid
 * @property int $superunitid
 * @property int $butypeid
 * @property string $businessunitname
 * @property string $businessunitstatus
 * @property int $modelid
 * @property int $entityid
 */
class Businessunit extends Entity
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
        'businessunitid' => false
    ];
    
    protected $_virtual=['key'];
    
    protected function _getKey(){
        return $this->businessunitid;
    }
}
