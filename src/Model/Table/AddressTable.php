<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Address Model
 *
 * @method \App\Model\Entity\Addres get($primaryKey, $options = [])
 * @method \App\Model\Entity\Addres newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Addres[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Addres|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Addres patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Addres[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Addres findOrCreate($search, callable $callback = null)
 */
class AddressTable extends Table
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

        $this->table('address');
        $this->displayField('addressid');
        $this->primaryKey('addressid');
        $this->belongsTo('city', [
            'className' => 'City',
            'foreignKey' => 'cityid'
        ]);
        $this->hasOne('tporganization', [
            'className' => 'Tporganization',
            'foreignKey' => 'addressid'
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
            ->integer('addressid')
            ->allowEmpty('addressid', 'create');

        $validator
            ->integer('cityid')
            ->requirePresence('cityid', 'create')
            ->notEmpty('cityid');

        $validator
            ->allowEmpty('addressline1');

        $validator
            ->allowEmpty('addressline2');

        return $validator;
    }
}
