<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evaltest Entity
 *
 * @property int $testid
 * @property int $testduration
 * @property int $durationunitfactor
 * @property int $tcategoryid
 * @property string $testtitle
 * @property string $testdescription
 */
class Evaltest extends Entity
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
        'testid' => false
    ];
    
    protected $_virtual=['categoryname'];
    
    protected function _getCategoryname(){
        if($this->testcategory==NULL){
            return '';
        }
        return $this->testcategory->tcategoryname;
    }
}
