<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Permissiongroup Model
 *
 * @method \App\Model\Entity\Permissiongroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\Permissiongroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Permissiongroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Permissiongroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permissiongroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Permissiongroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Permissiongroup findOrCreate($search, callable $callback = null)
 */
class PermissiongroupTable extends Table
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

        $this->table('permissiongroup');
        $this->displayField('pgroupid');
        $this->primaryKey('pgroupid');
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
            ->integer('pgroupid')
            ->allowEmpty('pgroupid', 'create');

        $validator
            ->requirePresence('pgroupname', 'create')
            ->notEmpty('pgroupname');

        $validator
            ->integer('parentgroup')
            ->allowEmpty('parentgroup');

        return $validator;
    }
}
