<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Abstractjob Model
 *
 * @method \App\Model\Entity\Abstractjob get($primaryKey, $options = [])
 * @method \App\Model\Entity\Abstractjob newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Abstractjob[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Abstractjob|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Abstractjob patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Abstractjob[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Abstractjob findOrCreate($search, callable $callback = null)
 */
class AbstractjobTable extends Table
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

        $this->table('abstractjob');
        $this->displayField('jobname');
        $this->primaryKey('jobid');
        $this->belongsTo('securitygroup', [
            'className' => 'Securitygroup',
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
            ->integer('jobid')
            ->allowEmpty('jobid', 'create');

        $validator
            ->requirePresence('jobname', 'create')
            ->notEmpty('jobname')
            ->add('jobname', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('jobtooltip');

        $validator
            ->integer('sgroupid')
            //->requirePresence('sgroupid', 'create')
            ->allowEmpty('sgroupid','create')
            ->add('sgroupid', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['jobname']));
        $rules->add($rules->isUnique(['sgroupid']));

        return $rules;
    }
}
