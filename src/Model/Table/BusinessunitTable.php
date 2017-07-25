<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\Behavior\TreeBehavior;
use Cake\Validation\Validator;

/**
 * Businessunit Model
 *
 * @method \App\Model\Entity\Businessunit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Businessunit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Businessunit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Businessunit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Businessunit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Businessunit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Businessunit findOrCreate($search, callable $callback = null)
 */
class BusinessunitTable extends Table
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
        $this->addBehavior('Tree', [
            'parent' => 'superunitid',
            'left' => 'lft',
            'right' => 'rght',
            'level' => 'level',
        ]);

        $this->table('businessunit');
        $this->displayField('businessunitname');
        $this->primaryKey('businessunitid');
        
        
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
            ->integer('businessunitid')
            ->allowEmpty('businessunitid', 'create');

        $validator
            ->integer('superunitid')
            ->allowEmpty('superunitid');

        $validator
            ->integer('butypeid')
            ->requirePresence('butypeid', 'create')
            ->notEmpty('butypeid');

        $validator
            ->requirePresence('businessunitname', 'create')
            ->notEmpty('businessunitname');

        $validator
            ->requirePresence('businessunitstatus', 'create')
            ->notEmpty('businessunitstatus');

        
        return $validator;
    }
}
