<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tporganization Entity
 *
 * @property int $organizationid
 * @property string $organizationname
 * @property int $addressid
 * @property string $organizationdescription
 * @property int $orgtypeid
 * @property int $structureid
 */
class Tporganization extends Entity
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
        'organizationid' => false
    ];
    
    protected $_virtual=['cityfullname'];
    
    protected function _getCityfullname(){
        return $this->address->city->cityname." - ".
        $this->address->city->country->countryname;
    }
}
