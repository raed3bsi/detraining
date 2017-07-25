<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tporganizationtype Model
 *
 * @method \App\Model\Entity\Tporganizationtype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tporganizationtype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tporganizationtype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tporganizationtype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tporganizationtype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tporganizationtype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tporganizationtype findOrCreate($search, callable $callback = null)
 */
class TporganizationtypeTable extends Table
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

        $this->table('tporganizationtype');
        $this->displayField('orgtypename');
        $this->primaryKey('orgtypeid');
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
            ->integer('orgtypeid')
            ->allowEmpty('orgtypeid', 'create');

        $validator
            ->requirePresence('orgtypename', 'create')
            ->notEmpty('orgtypename')
            ->add('orgtypename', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);


        $validator
            ->integer('structureid')
            ->allowEmpty('structureid');

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
        $rules->add($rules->isUnique(['orgtypename']));

        return $rules;
    }
}
