<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusinessunitPosition Model
 *
 * @method \App\Model\Entity\BusinessunitPosition get($primaryKey, $options = [])
 * @method \App\Model\Entity\BusinessunitPosition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BusinessunitPosition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BusinessunitPosition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusinessunitPosition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessunitPosition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessunitPosition findOrCreate($search, callable $callback = null)
 */
class BusinessunitPositionTable extends Table
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

        $this->table('businessunit_position');
        $this->displayField('businessunitpositionid');
        $this->primaryKey('businessunitpositionid');
        $this->belongsTo('securitygroup', [
            'className' => 'Securitygroup',
            'foreignKey' => 'sgroupid']);
        $this->belongsTo('position', [
            'className' => 'Positions',
            'foreignKey' => 'positionid'
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
            ->integer('positionid')
            ->requirePresence('positionid', 'create')
            ->notEmpty('positionid');

        $validator
            ->integer('businessunitid')
            ->requirePresence('businessunitid', 'create')
            ->notEmpty('businessunitid');

        $validator
            ->integer('personid')
            ->allowEmpty('personid');

        $validator
            ->integer('businessunitpositionid')
            ->allowEmpty('businessunitpositionid', 'create');

        $validator
            ->integer('sgroupid')
            ->allowEmpty('sgroupid');

        return $validator;
    }
}
