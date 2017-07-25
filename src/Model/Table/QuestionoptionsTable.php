<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questionoptions Model
 *
 * @method \App\Model\Entity\Questionoption get($primaryKey, $options = [])
 * @method \App\Model\Entity\Questionoption newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Questionoption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Questionoption|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Questionoption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Questionoption[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Questionoption findOrCreate($search, callable $callback = null)
 */
class QuestionoptionsTable extends Table
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

        $this->table('questionoptions');
        $this->displayField('optionid');
        $this->primaryKey('optionid');
        
        $this->belongsTo('question', [
            'className' => 'Question',
            'foreignKey' => 'questionid'
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
            ->integer('optionid')
            ->allowEmpty('optionid', 'create');

        $validator
            ->integer('questionid')
            ->requirePresence('questionid', 'create')
            ->notEmpty('questionid');

        $validator
            ->requirePresence('optiondesctription', 'create')
            ->notEmpty('optiondesctription');

        $validator
            ->integer('nextoption')
            ->allowEmpty('nextoption');

        return $validator;
    }
}
