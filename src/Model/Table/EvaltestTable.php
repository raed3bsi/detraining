<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Evaltest Model
 *
 * @method \App\Model\Entity\Evaltest get($primaryKey, $options = [])
 * @method \App\Model\Entity\Evaltest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Evaltest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Evaltest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evaltest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Evaltest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Evaltest findOrCreate($search, callable $callback = null)
 */
class EvaltestTable extends Table
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

        $this->table('evaltest');
        $this->displayField('testid');
        $this->primaryKey('testid');
        
        $this->belongsTo('testcategory', [
            'className' => 'Testcategory',
            'foreignKey' => 'tcategoryid'
        ]);
        
        $this->belongsToMany('Question', [
            'foreignKey' => 'testid',
            'targetForeignKey' => 'questionid',
            //'joinTable' => 'evaltest_questions'
            'through' => 'EvaltestQuestions'
        ]);
        
        $this->belongsTo('coursetopic', [
            'className' => 'Coursetopic',
            'foreignKey' => 'topicid'
        ]);
        
        $this->belongsTo('placementtest', [
            'className' => 'Placementtest',
            'foreignKey' => 'ptestid'
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
            ->integer('testid')
            ->allowEmpty('testid', 'create');

        $validator
            ->integer('testduration')
            ->allowEmpty('testduration');

        $validator
            ->integer('durationunitfactor')
            ->allowEmpty('durationunitfactor');

        $validator
            ->integer('tcategoryid')
            //->requirePresence('tcategoryid', 'create')
            ->allowEmpty('tcategoryid');

        $validator
            ->allowEmpty('testtitle');

        $validator
            ->allowEmpty('testdescription');

        return $validator;
    }
}
