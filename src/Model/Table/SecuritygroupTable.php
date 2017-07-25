<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Securitygroup Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentSecuritygroup
 * @property \Cake\ORM\Association\HasMany $ChildSecuritygroup
 *
 * @method \App\Model\Entity\Securitygroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\Securitygroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Securitygroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Securitygroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Securitygroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Securitygroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Securitygroup findOrCreate($search, callable $callback = null)
 */
class SecuritygroupTable extends Table
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

        $this->table('securitygroup');
        $this->displayField('sgroupid');
        $this->primaryKey('sgroupid');

        $this->belongsTo('ParentSecuritygroup', [
            'className' => 'Securitygroup',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildSecuritygroup', [
            'className' => 'Securitygroup',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('permissions', [
            'className' => 'SecuritygroupPermissions',
            'foreignKey' => 'sgroupid'
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
            ->integer('sgroupid')
            ->allowEmpty('sgroupid', 'create');

        $validator
            ->requirePresence('sgroupname', 'create')
            ->notEmpty('sgroupname')
            ->add('sgroupname', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('sgroupstatus', 'create')
            ->notEmpty('sgroupstatus');

        $validator
            ->integer('sgtypeid')
            ->requirePresence('sgtypeid', 'create')
            ->notEmpty('sgtypeid');

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
        $rules->add($rules->isUnique(['sgroupname']));
        $rules->add($rules->existsIn(['parent_id'], 'ParentSecuritygroup'));

        return $rules;
    }
}
