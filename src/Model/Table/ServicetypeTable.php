<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servicetype Model
 *
 * @method \App\Model\Entity\Servicetype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Servicetype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Servicetype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Servicetype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Servicetype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Servicetype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Servicetype findOrCreate($search, callable $callback = null)
 */
class ServicetypeTable extends Table
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

        $this->table('servicetype');
        $this->displayField('stypeid');
        $this->primaryKey('stypeid');
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
            ->integer('stypeid')
            ->allowEmpty('stypeid', 'create');

        $validator
            ->requirePresence('typename', 'create')
            ->notEmpty('typename')
            ->add('typename', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['typename']));

        return $rules;
    }
}
