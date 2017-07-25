<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Placementtest Model
 *
 * @method \App\Model\Entity\Placementtest get($primaryKey, $options = [])
 * @method \App\Model\Entity\Placementtest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Placementtest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Placementtest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Placementtest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Placementtest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Placementtest findOrCreate($search, callable $callback = null)
 */
class PlacementtestTable extends Table
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

        $this->table('placementtest');
        $this->displayField('ptestid');
        $this->primaryKey('ptestid');
        $this->belongsTo('service', [
            'className' => 'Service',
            'foreignKey' => 'serviceid'
        ]);
        $this->hasMany('placementroles', [
            'className' => 'Placementroles',
            'foreignKey' => 'ptestid'
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
            ->integer('ptestid')
            ->allowEmpty('ptestid', 'create');

        $validator
            ->integer('evaltestid')
            ->requirePresence('evaltestid', 'create')
            ->notEmpty('evaltestid');

        $validator
            ->requirePresence('ptestnumber', 'create')
            ->notEmpty('ptestnumber')
            ->add('ptestnumber', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('pteststatus')
            ->allowEmpty('pteststatus');

        $validator
            ->integer('documentid')
            ->allowEmpty('documentid');

        $validator
            ->integer('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            ->integer('serviceid')
            ->allowEmpty('serviceid');

        $validator
            ->requirePresence('ptestname', 'create')
            ->notEmpty('ptestname')
            ->add('ptestname', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['ptestnumber']));
        $rules->add($rules->isUnique(['ptestname']));

        return $rules;
    }
}
