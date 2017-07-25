<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fieldofstudy Model
 *
 * @method \App\Model\Entity\Fieldofstudy get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fieldofstudy newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fieldofstudy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fieldofstudy|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fieldofstudy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fieldofstudy[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fieldofstudy findOrCreate($search, callable $callback = null)
 */
class FieldofstudyTable extends Table
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

        $this->table('fieldofstudy');
        $this->displayField('fieldofstudyname');
        $this->primaryKey('fieldofstudyid');
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
            ->integer('fieldofstudyid')
            ->allowEmpty('fieldofstudyid', 'create');

        $validator
            ->requirePresence('fieldofstudyname', 'create')
            ->notEmpty('fieldofstudyname')
            ->add('fieldofstudyname', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['fieldofstudyname']));

        return $rules;
    }
}
