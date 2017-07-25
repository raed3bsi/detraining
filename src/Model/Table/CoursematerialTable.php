<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coursematerial Model
 *
 * @method \App\Model\Entity\Coursematerial get($primaryKey, $options = [])
 * @method \App\Model\Entity\Coursematerial newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Coursematerial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coursematerial|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coursematerial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Coursematerial[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coursematerial findOrCreate($search, callable $callback = null)
 */
class CoursematerialTable extends Table
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

        $this->table('coursematerial');
        $this->displayField('materialid');
        $this->primaryKey('materialid');
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
            ->integer('materialid')
            ->allowEmpty('materialid', 'create');

        $validator
            ->integer('topicid')
            ->requirePresence('topicid', 'create')
            ->notEmpty('topicid');

        $validator
            ->requirePresence('materialfile', 'create')
            ->notEmpty('materialfile');

        $validator
            ->requirePresence('materialname', 'create')
            ->notEmpty('materialname');

        $validator
            ->integer('mtypeid')
            ->allowEmpty('mtypeid');

        $validator
            ->allowEmpty('filetype');

        return $validator;
    }
}
