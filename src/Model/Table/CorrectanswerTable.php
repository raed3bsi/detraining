<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Correctanswer Model
 *
 * @method \App\Model\Entity\Correctanswer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Correctanswer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Correctanswer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Correctanswer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Correctanswer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Correctanswer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Correctanswer findOrCreate($search, callable $callback = null)
 */
class CorrectanswerTable extends Table
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

        $this->table('correctanswer');
        $this->displayField('id');
        $this->primaryKey('id');
        
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('questionid')
            //->requirePresence('questionid', 'create')
            ->allowEmpty('questionid');

        $validator
            //->requirePresence('answerdescription', 'create')
            ->allowEmpty('answerdescription');

        return $validator;
    }
}
