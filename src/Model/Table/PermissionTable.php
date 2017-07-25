<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Permission Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Securitygroup
 *
 * @method \App\Model\Entity\Permission get($primaryKey, $options = [])
 * @method \App\Model\Entity\Permission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Permission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Permission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Permission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Permission findOrCreate($search, callable $callback = null)
 */
class PermissionTable extends Table
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

        $this->table('permission');
        $this->displayField('permissionid');
        $this->primaryKey('permissionid');

        $this->belongsToMany('Securitygroup', [
            'foreignKey' => 'permission_id',
            'targetForeignKey' => 'securitygroup_id',
            'joinTable' => 'securitygroup_permissions'
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
            ->integer('permissionid')
            ->allowEmpty('permissionid', 'create');

        $validator
            ->requirePresence('permissionname', 'create')
            ->notEmpty('permissionname');

        $validator
            ->integer('pgroupid')
            ->requirePresence('pgroupid', 'create')
            ->notEmpty('pgroupid');

        return $validator;
    }
}
