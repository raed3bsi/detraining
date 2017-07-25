<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Addres Entity
 *
 * @property int $addressid
 * @property int $cityid
 * @property string $addressline1
 * @property string $addressline2
 */
class Addres extends Entity
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
        'addressid' => false
    ];
    
    protected $_virtual=['addresscountry'];
    
    protected function _getAddresscountry(){
        if($this->city==NULL){
            return NULL;
        }
        return $this->city->countryid;
    }
}
