<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\EntityInterface;

/**
 * Courseversion Model
 *
 * @method \App\Model\Entity\Courseversion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Courseversion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Courseversion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Courseversion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Courseversion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Courseversion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Courseversion findOrCreate($search, callable $callback = null)
 */
class CourseversionTable extends Table
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

        $this->table('courseversion');
        $this->displayField('versionid');
        $this->primaryKey('versionid');
        $this->belongsTo('course', [
            'className' => 'Course',
            'foreignKey' => 'courseid'
        ]);
        $this->hasOne('maintopic',[
            'className' => 'Coursetopic',
            'foreignKey' => 'versionid',
            'conditions' => ['parenttopicid IS' => NULL],
            'dependent' => TRUE
        ]);
        $this->belongsTo('service', [
            'className' => 'Service',
            'foreignKey' => 'serviceid'
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
            ->integer('courseid')
            //->requirePresence('courseid', 'create')
            ->allowEmpty('courseid');

        $validator
            ->integer('versionid')
            ->allowEmpty('versionid', 'create');

        $validator
            ->integer('versionseq')
            ->requirePresence('versionseq', 'create')
            ->notEmpty('versionseq');

        $validator
            ->requirePresence('versionname', 'create')
            ->notEmpty('versionname');

        $validator
            ->allowEmpty('coursedescription');

        $validator
            ->allowEmpty('courseobjectives');

        $validator
            ->allowEmpty('coursegoals');

        $validator
            ->integer('serviceid')
            ->allowEmpty('serviceid');

        $validator
            ->integer('documentid')
            //->requirePresence('documentid', 'create')
            ->allowEmpty('documentid');

        $validator
            ->integer('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            //->integer('versionstatus')
            ->requirePresence('versionstatus', 'create')
            ->notEmpty('versionstatus');

        $validator
            ->integer('traininghours')
            ->allowEmpty('traininghours');

        return $validator;
    }
    
    
}
