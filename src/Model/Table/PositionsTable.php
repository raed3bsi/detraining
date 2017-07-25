<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Positions Model
 *
 * @method \App\Model\Entity\Position get($primaryKey, $options = [])
 * @method \App\Model\Entity\Position newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Position[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Position|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Position patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Position[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Position findOrCreate($search, callable $callback = null)
 */
class PositionsTable extends Table
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

        $this->table('positions');
        $this->displayField('positionid');
        $this->primaryKey('positionid');
        $this->belongsTo('securitygroup', [
            'className' => 'Securitygroup',
            'foreignKey' => 'sgroupid']);
        $this->belongsTo('jobs', [
            'className' => 'Abstractjob',
            'foreignKey' => 'jobid'
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
            ->integer('positionid')
            ->allowEmpty('positionid', 'create');

        $validator
            ->requirePresence('positionname', 'create')
            ->notEmpty('positionname');

        $validator
            ->integer('sgroupid')
            //->requirePresence('sgroupid', 'create')
            ->allowEmpty('sgroupid','create')
            ->add('sgroupid', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('jobid')
            ->requirePresence('jobid', 'create')
            ->notEmpty('jobid');

        $validator
            ->integer('businessunitid')
            ->requirePresence('businessunitid', 'create')
            ->notEmpty('businessunitid');

        $validator
            ->integer('maxnoinstances')
            ->allowEmpty('maxnoinstances');

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
        $rules->add($rules->isUnique(['sgroupid']));

        return $rules;
    }
}
