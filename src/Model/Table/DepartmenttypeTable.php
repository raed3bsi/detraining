<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Departmenttype Model
 *
 * @method \App\Model\Entity\Departmenttype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Departmenttype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Departmenttype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Departmenttype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Departmenttype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Departmenttype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Departmenttype findOrCreate($search, callable $callback = null)
 */
class DepartmenttypeTable extends Table
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

        $this->table('departmenttype');
        $this->displayField('depttypename');
        $this->primaryKey('depttypeid');
        $this->belongsTo('subtypes', [
            'className' => 'Departmenttype',
            'foreignKey' => 'subtypeid'
        ]);
        $this->hasOne('supertype',[
            'className' => 'Departmenttype',
            'foreignKey' => 'subtypeid'
        ]);
        $this->addBehavior('OUsync', ['modelname' => 'departmenttype']);
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
            ->integer('depttypeid')
            ->allowEmpty('depttypeid', 'create');

        $validator
            ->requirePresence('depttypename', 'create')
            ->notEmpty('depttypename')
            ->add('depttypename', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('subtypeid')
            ->allowEmpty('subtypeid')
            ->add('subtypeid', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['depttypename']));
        $rules->add($rules->isUnique(['subtypeid']));

        return $rules;
    }
}
