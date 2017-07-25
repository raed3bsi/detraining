<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Organizationstructure Model
 *
 * @method \App\Model\Entity\Organizationstructure get($primaryKey, $options = [])
 * @method \App\Model\Entity\Organizationstructure newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Organizationstructure[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Organizationstructure|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Organizationstructure patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Organizationstructure[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Organizationstructure findOrCreate($search, callable $callback = null)
 */
class OrganizationstructureTable extends Table
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

        $this->table('organizationstructure');
        $this->displayField('structureid');
        $this->primaryKey('structureid');
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
            ->integer('structureid')
            ->allowEmpty('structureid', 'create');

        $validator
            ->allowEmpty('structurehint');

        return $validator;
    }
}
