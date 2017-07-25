<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Placementroles Model
 *
 * @method \App\Model\Entity\Placementrole get($primaryKey, $options = [])
 * @method \App\Model\Entity\Placementrole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Placementrole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Placementrole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Placementrole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Placementrole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Placementrole findOrCreate($search, callable $callback = null)
 */
class PlacementrolesTable extends Table
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

        $this->table('placementroles');
        $this->displayField('roleid');
        $this->primaryKey('roleid');
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
            ->integer('roleid')
            ->allowEmpty('roleid', 'create');

        $validator
            ->integer('ptestid')
            ->requirePresence('ptestid', 'create')
            ->notEmpty('ptestid');

        $validator
            ->integer('slevelid')
            ->requirePresence('slevelid', 'create')
            ->notEmpty('slevelid');

        $validator
            ->numeric('mingrade')
            ->requirePresence('mingrade', 'create')
            ->notEmpty('mingrade');

        

        return $validator;
    }
}
