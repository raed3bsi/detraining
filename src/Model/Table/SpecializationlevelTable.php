<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Specializationlevel Model
 *
 * @method \App\Model\Entity\Specializationlevel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Specializationlevel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Specializationlevel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Specializationlevel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Specializationlevel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Specializationlevel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Specializationlevel findOrCreate($search, callable $callback = null)
 */
class SpecializationlevelTable extends Table
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

        $this->table('specializationlevel');
        $this->displayField('levelname');
        $this->primaryKey('slevelid');
        $this->belongsTo('specialization', [
            'className' => 'Specialization',
            'foreignKey' => 'specializationid'
        ]);
        $this->belongsToMany('Course', [
            'foreignKey' => 'slevelid',
            'targetForeignKey' => 'courseid',
            'joinTable' => 'specializationlevel_courses'
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
            ->integer('slevelid')
            ->allowEmpty('slevelid', 'create');

        $validator
            ->integer('levelno')
            ->requirePresence('levelno', 'create')
            ->notEmpty('levelno');

        $validator
            ->requirePresence('levelname', 'create')
            ->notEmpty('levelname');

        $validator
            ->integer('specializationid')
            //->allowEmpty('specializationid', 'create')
            ->allowEmpty('specializationid');

        $validator
            ->integer('duration')
            ->allowEmpty('duration');

        return $validator;
    }
}
