<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Persontype Model
 *
 * @method \App\Model\Entity\Persontype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Persontype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Persontype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Persontype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Persontype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Persontype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Persontype findOrCreate($search, callable $callback = null)
 */
class PersontypeTable extends Table
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

        $this->table('persontype');
        $this->displayField('persontypeid');
        $this->primaryKey('persontypeid');
        $this->belongsTo('securitygroup', [
            'className' => 'Securitygroup',
            'foreignKey' => 'sgroupid']);
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
            ->integer('persontypeid')
            ->allowEmpty('persontypeid', 'create');

        $validator
            ->requirePresence('persontypename', 'create')
            ->notEmpty('persontypename')
            ->add('persontypename', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('persontypelabel', 'create')
            ->notEmpty('persontypelabel')
            ->add('persontypelabel', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('sgroupid')
            ->requirePresence('sgroupid', 'create')
            ->notEmpty('sgroupid');

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
        $rules->add($rules->isUnique(['persontypename']));
        $rules->add($rules->isUnique(['persontypelabel']));

        return $rules;
    }
}
