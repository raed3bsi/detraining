<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity
 *
 * @property int $courseid
 * @property int $categoryid
 * @property string $coursenumber
 * @property string $coursename
 * @property int $coursestatus
 * @property int $documentid
 * @property int $createdby
 * @property int $lastversion
 *
 * @property \App\Model\Entity\Fieldofstudy[] $fieldofstudy
 */
class Course extends Entity
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
        'courseid' => false
    ];
    
    protected $_virtual=['categoryname','ownername'];
    
    protected function _getCategoryname(){
        if($this->category!=NULL){
            return $this->category->categoryname;
        }
        return '';
    }
    
    protected function _getOwnername(){
        if(!isset($this->owner->person)){
            return '';
        }
        return $this->owner->person->personname;
    }
}
