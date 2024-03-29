<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Appmodel Model
 *
 * @method \App\Model\Entity\Appmodel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Appmodel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Appmodel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Appmodel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Appmodel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Appmodel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Appmodel findOrCreate($search, callable $callback = null)
 */
class AppmodelTable extends Table
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

        $this->table('appmodel');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasOne('unitconfigs', [
            'className' => 'Unitsconfiguration',
            'foreignKey' => 'modelid'
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
            ->requirePresence('modelname', 'create')
            ->notEmpty('modelname')
            ->add('modelname', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('pkfield');

        $validator
            ->allowEmpty('displayfield');

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
        $rules->add($rules->isUnique(['modelname']));

        return $rules;
    }
}
