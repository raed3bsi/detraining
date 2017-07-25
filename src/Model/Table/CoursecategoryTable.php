<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coursecategory Model
 *
 * @method \App\Model\Entity\Coursecategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Coursecategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Coursecategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coursecategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coursecategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Coursecategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coursecategory findOrCreate($search, callable $callback = null)
 */
class CoursecategoryTable extends Table
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

        $this->table('coursecategory');
        $this->displayField('categoryname');
        $this->primaryKey('categoryid');
        $this->belongsTo('parentcat', [
            'className' => 'Coursecategory',
            'foreignKey' => 'parentcategory'
        ]);
        $this->hasMany('subcats',[
            'className' => 'Coursecategory',
            'foreignKey' => 'parentcategory'
        ]);
        $this->hasMany('courses', [
            'className' => 'Course',
            'foreignKey' => 'categoryid'
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
            ->integer('categoryid')
            ->allowEmpty('categoryid', 'create');

        $validator
            ->integer('parentcategory')
            ->allowEmpty('parentcategory');

        $validator
            ->requirePresence('categoryname', 'create')
            ->notEmpty('categoryname')
            ->add('categoryname', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        
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
        $rules->add($rules->isUnique(['categoryname']));

        return $rules;
    }
}
