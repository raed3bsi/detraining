<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EvaltestQuestions Model
 *
 * @method \App\Model\Entity\EvaltestQuestion get($primaryKey, $options = [])
 * @method \App\Model\Entity\EvaltestQuestion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EvaltestQuestion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EvaltestQuestion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EvaltestQuestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EvaltestQuestion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EvaltestQuestion findOrCreate($search, callable $callback = null)
 */
class EvaltestQuestionsTable extends Table
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

        $this->table('evaltest_questions');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Question', [
            'className' => 'Question',
            'foreignKey' => 'questionid'
        ]);
        $this->belongsTo('Evaltest', [
            'className' => 'Evaltest',
            'foreignKey' => 'testid'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('testid')
            ->requirePresence('testid', 'create')
            ->notEmpty('testid');

        $validator
            ->integer('questionid')
            ->requirePresence('questionid', 'create')
            ->notEmpty('questionid');

        $validator
            ->integer('questionnumber')
            ->allowEmpty('questionnumber');

        return $validator;
    }
}
