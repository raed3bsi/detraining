<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $questionid
 * @property int $parent_questionid
 * @property int $difficultyid
 * @property string $questiondescription
 * @property int $qtypeid
 * @property int $topicid
 * @property float $points
 * @property float $negativepoints
 * @property bool $pointsfactor
 * @property int $owner
 */
class Question extends Entity
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
        'questionid' => false
    ];
    
    protected $_virtual=['typename','difficulty'];
    
    protected function _getTypename(){
        return $this->questiontype->qtypename;
    }
    
    protected function _getDifficulty(){
        return $this->qdifficulty->difficultyname;
    }
}
