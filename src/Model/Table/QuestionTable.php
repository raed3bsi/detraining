<?php
namespace App\Model\Table;

use App\Model\Entity\Question;
use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Question Model
 *
 * @method Question get($primaryKey, $options = [])
 * @method Question newEntity($data = null, array $options = [])
 * @method Question[] newEntities(array $data, array $options = [])
 * @method Question|bool save(EntityInterface $entity, $options = [])
 * @method Question patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Question[] patchEntities($entities, array $data, array $options = [])
 * @method Question findOrCreate($search, callable $callback = null)
 */
class QuestionTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('question');
        $this->displayField('questionid');
        $this->primaryKey('questionid');
        
        $this->hasMany('subquestions', [
            'className' => 'Question',
            'foreignKey' => 'parent_questionid',
            'dependent' => TRUE
        ]);
        
        $this->belongsTo('parentquestion', [
            'className' => 'Question',
            'foreignKey' => 'parent_questionid'
        ]);
        
        $this->hasMany('correctanswers', [
            'className' => 'Correctanswer',
            'foreignKey' => 'questionid',
            'dependent' => TRUE
        ]);
        
        $this->hasMany('questionanswer', [
            'className' => 'Questionanswer',
            'foreignKey' => 'questionid',
            'dependent' => TRUE
        ]);
        
        $this->belongsTo('qdifficulty', [
            'className' => 'Questiondifficulty',
            'foreignKey' => 'difficultyid'
        ]);
        
        $this->hasMany('questionoptions',[
            'className' => 'Questionoptions',
            'foreignKey' => 'questionid',
            'dependent' => TRUE
        ]);
        
        $this->belongsTo('questiontype', [
            'className' => 'Questiontype',
            'foreignKey' => 'qtypeid'
        ]);
        $this->belongsToMany('Evaltest', [
            'foreignKey' => 'questionid',
            'targetForeignKey' => 'testid',
            //'joinTable' => 'evaltest_questions'
            'through' => 'EvaltestQuestions'
        ]);
        $this->hasMany('EvaltestQuestions', [
            'className' => 'EvaltestQuestions',
            'foreignKey' => 'questionid'
        ]);
        $this->belongsTo('coursetopic', [
            'className' => 'Coursetopic',
            'foreignKey' => 'topicid'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('questionid')
            ->allowEmpty('questionid', 'create');

        $validator
            ->integer('parent_questionid')
            ->allowEmpty('parent_questionid');

        $validator
            ->integer('difficultyid')
            //->requirePresence('difficultyid', 'create')
            ->allowEmpty('difficultyid');

        $validator
            ->allowEmpty('questiondescription');

        $validator
            ->integer('qtypeid')
            ->allowEmpty('qtypeid');

        $validator
            ->integer('topicid')
            ->allowEmpty('topicid');

        $validator
            ->numeric('points')
            ->allowEmpty('points');

        $validator
            ->numeric('negativepoints')
            ->allowEmpty('negativepoints');

        $validator
            ->boolean('pointsfactor')
            ->allowEmpty('pointsfactor');

        $validator
            ->integer('owner')
            //->requirePresence('owner', 'create')
            ->allowEmpty('owner');

        return $validator;
    }
    
    public function beforeSave(Event $event, EntityInterface $entity, ArrayObject $options){
        if(NULL !==$entity->get('parentquestion')){
            $entity->set('owner',$entity->get('parentquestion')->get('owner'));
            $entity->set('difficultyid',$entity->get('parentquestion')->get('difficultyid'));
        }
    }
    
}
