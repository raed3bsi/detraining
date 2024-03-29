<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Educationlevel Model
 *
 * @method \App\Model\Entity\Educationlevel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Educationlevel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Educationlevel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Educationlevel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Educationlevel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Educationlevel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Educationlevel findOrCreate($search, callable $callback = null)
 */
class EducationlevelTable extends Table
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

        $this->table('educationlevel');
        $this->displayField('educationlevelid');
        $this->primaryKey('educationlevelid');
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
            ->integer('educationlevelid')
            ->allowEmpty('educationlevelid', 'create');

        $validator
            ->requirePresence('educationlevelname', 'create')
            ->notEmpty('educationlevelname')
            ->add('educationlevelname', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['educationlevelname']));

        return $rules;
    }
}
