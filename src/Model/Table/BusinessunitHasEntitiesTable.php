<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusinessunitHasEntities Model
 *
 * @method \App\Model\Entity\BusinessunitHasEntity get($primaryKey, $options = [])
 * @method \App\Model\Entity\BusinessunitHasEntity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BusinessunitHasEntity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BusinessunitHasEntity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusinessunitHasEntity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessunitHasEntity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessunitHasEntity findOrCreate($search, callable $callback = null)
 */
class BusinessunitHasEntitiesTable extends Table
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

        $this->table('businessunit_has_entities');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('businessunitid')
            ->requirePresence('businessunitid', 'create')
            ->notEmpty('businessunitid');

        $validator
            ->integer('modelid')
            ->requirePresence('modelid', 'create')
            ->notEmpty('modelid');

        $validator
            ->integer('entityid')
            ->requirePresence('entityid', 'create')
            ->notEmpty('entityid');

        return $validator;
    }
}
