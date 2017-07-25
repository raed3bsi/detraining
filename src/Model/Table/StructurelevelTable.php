<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Structurelevel Model
 *
 * @method \App\Model\Entity\Structurelevel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Structurelevel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Structurelevel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Structurelevel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Structurelevel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Structurelevel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Structurelevel findOrCreate($search, callable $callback = null)
 */
class StructurelevelTable extends Table
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

        $this->table('structurelevel');
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
            ->integer('levelno')
            ->requirePresence('levelno', 'create')
            ->notEmpty('levelno');

        $validator
            ->requirePresence('levelname', 'create')
            ->notEmpty('levelname');

        $validator
            ->integer('structureid')
            ->requirePresence('structureid', 'create')
            ->notEmpty('structureid');

        return $validator;
    }
}
