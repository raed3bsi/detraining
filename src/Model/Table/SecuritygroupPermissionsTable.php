<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SecuritygroupPermissions Model
 *
 * @method \App\Model\Entity\SecuritygroupPermission get($primaryKey, $options = [])
 * @method \App\Model\Entity\SecuritygroupPermission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SecuritygroupPermission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SecuritygroupPermission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SecuritygroupPermission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SecuritygroupPermission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SecuritygroupPermission findOrCreate($search, callable $callback = null)
 */
class SecuritygroupPermissionsTable extends Table
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

        $this->table('securitygroup_permissions');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('permission', [
            'className' => 'Permission',
            'foreignKey' => 'permissionid'
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
            ->integer('permissionid')
            ->requirePresence('permissionid', 'create')
            ->notEmpty('permissionid');

        $validator
            ->integer('sgroupid')
            ->requirePresence('sgroupid', 'create')
            ->notEmpty('sgroupid');

        $validator
            ->requirePresence('permissiontype', 'create')
            ->notEmpty('permissiontype');

        return $validator;
    }
}
