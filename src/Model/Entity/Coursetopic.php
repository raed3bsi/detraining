<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Coursetopic Entity
 *
 * @property int $topicid
 * @property int $versionid
 * @property int $parenttopicid
 * @property int $previoustopicid
 * @property int $traininghours
 * @property int $testid
 * @property string $topictitle
 * @property string $topicdescription
 */
class Coursetopic extends Entity
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
        'topicid' => false
    ];
    
    protected $_virtual=['icon','key','hideCheckbox','tooltip','title'];
    

    protected function _getTitle(){
        return $this->topictitle;
    }
    
    protected function _getTooltip(){
        $s=  substr($this->topicdescription, 0, 250);
        return substr($s, 0, strrpos($s, ' '));
    }
    
    protected function _getHideCheckbox(){
        return TRUE;
    }
    
    protected function _getKey(){
        return $this->topicid;
    }
    
    protected function _getIcon(){
        return false;
    }
}
