<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Appaction Model
 *
 * @method \App\Model\Entity\Appaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Appaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Appaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Appaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Appaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Appaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Appaction findOrCreate($search, callable $callback = null)
 */
class AppactionTable extends Table
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

        $this->table('appaction');
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
            ->integer('acoid')
            ->requirePresence('acoid', 'create')
            ->notEmpty('acoid');

        $validator
            ->requirePresence('actionname', 'create')
            ->notEmpty('actionname');

        $validator
            ->requirePresence('actiontype', 'create')
            ->notEmpty('actiontype');

        $validator
            ->integer('dependon')
            ->allowEmpty('dependon');

        $validator
            ->requirePresence('displayname', 'create')
            ->notEmpty('displayname');

        $validator
            ->allowEmpty('affectedprops');

        $validator
            ->requirePresence('urlpattern', 'create')
            ->notEmpty('urlpattern');

        return $validator;
    }
}
