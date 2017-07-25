<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exchangerates Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Journalentry
 *
 * @method \App\Model\Entity\Exchangerate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Exchangerate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Exchangerate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exchangerate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exchangerate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Exchangerate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exchangerate findOrCreate($search, callable $callback = null)
 */
class ExchangeratesTable extends Table
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

        $this->table('exchangerates');
        $this->displayField('exchangeid');
        $this->primaryKey('exchangeid');

        $this->belongsToMany('Journalentry', [
            'foreignKey' => 'exchangerate_id',
            'targetForeignKey' => 'journalentry_id',
            'joinTable' => 'journalentry_exchangerates'
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
            ->integer('exchangeid')
            ->allowEmpty('exchangeid', 'create');

        $validator
            ->date('exchangedate')
            ->requirePresence('exchangedate', 'create')
            ->notEmpty('exchangedate');

        $validator
            ->integer('fromcurrency')
            ->requirePresence('fromcurrency', 'create')
            ->notEmpty('fromcurrency');

        $validator
            ->integer('tocurrency')
            ->requirePresence('tocurrency', 'create')
            ->notEmpty('tocurrency');

        $validator
            ->decimal('exchangerate')
            ->requirePresence('exchangerate', 'create')
            ->notEmpty('exchangerate');

        $validator
            ->decimal('inverserate')
            ->requirePresence('inverserate', 'create')
            ->notEmpty('inverserate');

        return $validator;
    }
}
