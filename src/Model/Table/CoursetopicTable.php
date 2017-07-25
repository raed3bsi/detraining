<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coursetopic Model
 *
 * @method \App\Model\Entity\Coursetopic get($primaryKey, $options = [])
 * @method \App\Model\Entity\Coursetopic newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Coursetopic[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coursetopic|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coursetopic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Coursetopic[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coursetopic findOrCreate($search, callable $callback = null)
 */
class CoursetopicTable extends Table
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
        
        $this->addBehavior('Tree', [
            'parent' => 'parenttopicid',
            'left' => 'lft',
            'right' => 'rght',
        ]);

        $this->table('coursetopic');
        $this->displayField('topicid');
        $this->primaryKey('topicid');
        $this->belongsTo('courseversion', [
            'className' => 'Courseversion',
            'foreignKey' => 'versionid'
        ]);
        /*
        $this->belongsTo('prevtopic', [
            'className' => 'Coursetopic',
            'foreignKey' => 'previoustopicid'
        ]);
        $this->hasOne('nexttopic', [
            'className' => 'Coursetopic',
            'foreignKey' => 'previoustopicid'
        ]);
         * $this->hasOne('firstchild', [
            'className' => 'Coursetopic',
            'foreignKey' => 'parenttopicid',
            'conditions' => ['firstchild.previoustopicid IS' => NULL]
        ]);
         * 
         */
        $this->hasMany('subtopics', [
            'className' => 'Coursetopic',
            'foreignKey' => 'parenttopicid'
        ]);
        
        $this->belongsTo('parenttopic',[
            'className' => 'Coursetopic',
            'foreignKey' => 'parenttopicid'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('topicid')
            ->allowEmpty('topicid', 'create');

        $validator
            ->integer('parenttopicid')
            ->allowEmpty('parenttopicid');

        

        $validator
            ->integer('traininghours')
            ->allowEmpty('traininghours');

        $validator
            ->requirePresence('topictitle', 'create')
            ->notEmpty('topictitle');

        $validator
            ->allowEmpty('topicdescription');

        return $validator;
    }
}
