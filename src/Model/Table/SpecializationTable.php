<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Specialization Model
 *
 * @method \App\Model\Entity\Specialization get($primaryKey, $options = [])
 * @method \App\Model\Entity\Specialization newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Specialization[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Specialization|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Specialization patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Specialization[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Specialization findOrCreate($search, callable $callback = null)
 */
class SpecializationTable extends Table
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

        $this->table('specialization');
        $this->displayField('specializationname');
        $this->primaryKey('specializationid');
        $this->hasMany('slevels', [
            'className' => 'Specializationlevel',
            'foreignKey' => 'specializationid'
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
            ->integer('specializationid')
            ->allowEmpty('specializationid', 'create');

        $validator
            ->requirePresence('specializationname', 'create')
            ->notEmpty('specializationname')
            ->add('specializationname', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('specializationdescription');

        $validator
            ->integer('nolevels')
            ->allowEmpty('nolevels');

        $validator
            ->integer('ptestid')
            ->allowEmpty('ptestid');

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
        $rules->add($rules->isUnique(['specializationname']));

        return $rules;
    }
}
