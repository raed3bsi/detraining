<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sgrouptype Model
 *
 * @method \App\Model\Entity\Sgrouptype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sgrouptype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sgrouptype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sgrouptype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sgrouptype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sgrouptype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sgrouptype findOrCreate($search, callable $callback = null)
 */
class SgrouptypeTable extends Table
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

        $this->table('sgrouptype');
        $this->displayField('sgtypeid');
        $this->primaryKey('sgtypeid');
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
            ->integer('sgtypeid')
            ->allowEmpty('sgtypeid', 'create');

        $validator
            ->requirePresence('sgtypename', 'create')
            ->notEmpty('sgtypename')
            ->add('sgtypename', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('sgtypecode');

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
        $rules->add($rules->isUnique(['sgtypename']));

        return $rules;
    }
}
