<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Department Model
 *
 * @method \App\Model\Entity\Department get($primaryKey, $options = [])
 * @method \App\Model\Entity\Department newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Department[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Department|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Department patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Department[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Department findOrCreate($search, callable $callback = null)
 */
class DepartmentTable extends Table
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

        $this->table('department');
        $this->displayField('departmentname');
        $this->primaryKey('departmentid');
        $this->belongsTo('parentdept', [
            'className' => 'Department',
            'foreignKey' => 'parentdeptid'
        ]);
        $this->belongsTo('depttype', [
            'className' => 'Departmenttype',
            'foreignKey' => 'depttypeid'
        ]);
        $this->addBehavior('OUsync', ['modelname' => 'department']);
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
            ->integer('departmentid')
            ->allowEmpty('departmentid', 'create');

        $validator
            ->requirePresence('departmentname', 'create')
            ->notEmpty('departmentname');

        $validator
            ->integer('parentdeptid')
            ->allowEmpty('parentdeptid');

        $validator
            ->integer('depttypeid')
            ->requirePresence('depttypeid', 'create')
            ->notEmpty('depttypeid');

        $validator
            ->integer('bunitid')
            ->allowEmpty('bunitid');

        return $validator;
    }
}
