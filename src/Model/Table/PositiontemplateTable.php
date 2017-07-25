<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Positiontemplate Model
 *
 * @method \App\Model\Entity\Positiontemplate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Positiontemplate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Positiontemplate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Positiontemplate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Positiontemplate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Positiontemplate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Positiontemplate findOrCreate($search, callable $callback = null)
 */
class PositiontemplateTable extends Table
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

        $this->table('positiontemplate');
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
            ->integer('jobid')
            ->requirePresence('jobid', 'create')
            ->notEmpty('jobid');

        $validator
            ->integer('butypeid')
            ->allowEmpty('butypeid');

        $validator
            ->integer('rootunitid')
            ->allowEmpty('rootunitid');

        $validator
            ->integer('instances')
            ->requirePresence('instances', 'create')
            ->notEmpty('instances');

        return $validator;
    }
}
