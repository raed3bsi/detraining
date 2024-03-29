<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Materialtype Model
 *
 * @method \App\Model\Entity\Materialtype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Materialtype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Materialtype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Materialtype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Materialtype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Materialtype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Materialtype findOrCreate($search, callable $callback = null)
 */
class MaterialtypeTable extends Table
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

        $this->table('materialtype');
        $this->displayField('mtypeid');
        $this->primaryKey('mtypeid');
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
            ->integer('mtypeid')
            ->allowEmpty('mtypeid', 'create');

        $validator
            ->requirePresence('mtypename', 'create')
            ->notEmpty('mtypename')
            ->add('mtypename', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['mtypename']));

        return $rules;
    }
}
