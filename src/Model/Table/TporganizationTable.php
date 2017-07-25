<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tporganization Model
 *
 * @method \App\Model\Entity\Tporganization get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tporganization newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tporganization[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tporganization|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tporganization patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tporganization[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tporganization findOrCreate($search, callable $callback = null)
 */
class TporganizationTable extends Table
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

        $this->table('tporganization');
        $this->displayField('organizationid');
        $this->primaryKey('organizationid');
        $this->belongsTo('businessunit', [
            'className' => 'Businessunit',
            'foreignKey' => 'rootunitid'
        ]);
        $this->belongsTo('tporgtype', [
            'className' => 'Tporganizationtype',
            'foreignKey' => 'orgtypeid'
        ]);
        $this->belongsTo('address', [
            'className' => 'Address',
            'foreignKey' => 'addressid',
            'propertyName' => 'address'
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
            ->integer('organizationid')
            ->allowEmpty('organizationid', 'create');

        $validator
            ->requirePresence('organizationname', 'create')
            ->notEmpty('organizationname');

        $validator
            ->integer('addressid')
            ->allowEmpty('addressid');

        $validator
            ->allowEmpty('organizationdescription');

        $validator
            ->integer('orgtypeid')
            ->requirePresence('orgtypeid', 'create')
            ->notEmpty('orgtypeid');

        $validator
            ->integer('rootunitid')
            ->allowEmpty('rootunitid');

        return $validator;
    }
}
