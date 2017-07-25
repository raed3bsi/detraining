<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Unitsconfiguration Model
 *
 * @method \App\Model\Entity\Unitsconfiguration get($primaryKey, $options = [])
 * @method \App\Model\Entity\Unitsconfiguration newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Unitsconfiguration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Unitsconfiguration|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Unitsconfiguration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Unitsconfiguration[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Unitsconfiguration findOrCreate($search, callable $callback = null)
 */
class UnitsconfigurationTable extends Table
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

        $this->table('unitsconfiguration');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('appmodel', [
            'className' => 'Appmodel',
            'foreignKey' => 'modelid'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('modelid')
            ->allowEmpty('modelid')
            ->add('modelid', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('configas');

        $validator
            ->integer('unittypeid')
            ->allowEmpty('unittypeid');

        $validator
            ->integer('typeconfigid')
            ->allowEmpty('typeconfigid');

        $validator
            ->allowEmpty('typeref');

        $validator
            ->integer('parentmodel')
            ->allowEmpty('parentmodel');

        $validator
            ->allowEmpty('parentref');

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
        $rules->add($rules->isUnique(['modelid']));

        return $rules;
    }
}
