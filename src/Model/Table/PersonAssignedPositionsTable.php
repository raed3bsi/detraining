<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PersonAssignedPositions Model
 *
 * @method \App\Model\Entity\PersonAssignedPosition get($primaryKey, $options = [])
 * @method \App\Model\Entity\PersonAssignedPosition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PersonAssignedPosition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PersonAssignedPosition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PersonAssignedPosition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PersonAssignedPosition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PersonAssignedPosition findOrCreate($search, callable $callback = null)
 */
class PersonAssignedPositionsTable extends Table
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

        $this->table('person_assigned_positions');
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
            ->integer('personid')
            ->requirePresence('personid', 'create')
            ->notEmpty('personid');

        $validator
            ->integer('positionid')
            ->requirePresence('positionid', 'create')
            ->notEmpty('positionid');

        $validator
            ->dateTime('validfrom')
            ->allowEmpty('validfrom');

        $validator
            ->dateTime('validuntil')
            ->allowEmpty('validuntil');

        $validator
            ->allowEmpty('assignmentstatus');

        $validator
            ->dateTime('activatedon')
            ->allowEmpty('activatedon');

        $validator
            ->dateTime('invalidatedon')
            ->allowEmpty('invalidatedon');

        return $validator;
    }
}
