<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Person Model
 *
 * @method \App\Model\Entity\Person get($primaryKey, $options = [])
 * @method \App\Model\Entity\Person newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Person[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Person|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Person[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Person findOrCreate($search, callable $callback = null)
 */
class PersonTable extends Table
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

        $this->table('person');
        $this->displayField('personid');
        $this->primaryKey('personid');
        $this->hasMany('unitpositions', [
            'className' => 'BusinessunitPosition',
            'foreignKey' => 'personid'
        ]);
        $this->belongsTo('persontype', [
            'className' => 'Persontype',
            'foreignKey' => 'persontype']);
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
            ->integer('personid')
            ->allowEmpty('personid', 'create');

        $validator
            ->allowEmpty('personname');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->date('dateofbirth')
            ->allowEmpty('dateofbirth');

        $validator
            ->allowEmpty('mobile');

        $validator
            ->allowEmpty('workphone');

        $validator
            ->integer('addressid')
            ->allowEmpty('addressid');

        $validator
            ->integer('educationlevelid')
            ->allowEmpty('educationlevelid');

        $validator
            ->allowEmpty('gender');

        $validator
            ->date('registrationdate')
            ->allowEmpty('registrationdate');

        $validator
            ->integer('persontype')
            ->requirePresence('persontype', 'create')
            ->notEmpty('persontype');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
