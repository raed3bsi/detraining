<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questiontype Model
 *
 * @method \App\Model\Entity\Questiontype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Questiontype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Questiontype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Questiontype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Questiontype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Questiontype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Questiontype findOrCreate($search, callable $callback = null)
 */
class QuestiontypeTable extends Table
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

        $this->table('questiontype');
        $this->displayField('qtypeid');
        $this->primaryKey('qtypeid');
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
            ->integer('qtypeid')
            ->allowEmpty('qtypeid', 'create');

        $validator
            ->requirePresence('qtypename', 'create')
            ->notEmpty('qtypename')
            ->add('qtypename', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('editelement');

        $validator
            ->allowEmpty('viewelement');

        $validator
            ->allowEmpty('serializationhandler');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['qtypename']));

        return $rules;
    }
}
