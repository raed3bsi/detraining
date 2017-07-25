<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Course Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Fieldofstudy
 *
 * @method \App\Model\Entity\Course get($primaryKey, $options = [])
 * @method \App\Model\Entity\Course newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Course[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Course|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Course patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Course[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Course findOrCreate($search, callable $callback = null)
 */
class CourseTable extends Table
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

        $this->table('course');
        $this->displayField('coursename');
        $this->primaryKey('courseid');

        $this->belongsToMany('Fieldofstudy', [
            'foreignKey' => 'courseid',
            'targetForeignKey' => 'fieldofstudyid',
            'joinTable' => 'fieldofstudy_courses',
            'saveStrategy' => 'append'
        ]);
        
        $this->belongsToMany('Specializationlevel', [
            'foreignKey' => 'courseid',
            'targetForeignKey' => 'slevelid',
            'joinTable' => 'specializationlevel_courses',
            'saveStrategy' => 'append'
        ]);
        
        $this->hasMany('versions',[
            'className' => 'courseversion',
            'foreignKey' => 'courseid',
            'dependent' => TRUE
        ]);
        
        $this->belongsTo('category', [
            'className' => 'Coursecategory',
            'foreignKey' => 'categoryid'
        ]);
        
        $this->belongsTo('owner', [
            'className' => 'User',
            'foreignKey' => 'createdby'
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
            ->allowEmpty('courseid', 'create');

        $validator
            ->integer('categoryid')
            ->requirePresence('categoryid', 'create')
            ->notEmpty('categoryid');

        $validator
            ->requirePresence('coursenumber', 'create')
            ->notEmpty('coursenumber')
            ->add('coursenumber', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('coursename', 'create')
            ->notEmpty('coursename')
            ->add('coursename', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            //->integer('coursestatus')
            ->requirePresence('coursestatus', 'create')
            ->notEmpty('coursestatus');

        $validator
            ->integer('documentid')
            //->requirePresence('documentid', 'create')
            ->allowEmpty('documentid');

        $validator
            ->integer('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            ->integer('lastversion')
            ->allowEmpty('lastversion');

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
        $rules->add($rules->isUnique(['coursenumber']));
        $rules->add($rules->isUnique(['coursename']));

        return $rules;
    }
}
