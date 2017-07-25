<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questionanswer Model
 *
 * @method \App\Model\Entity\Questionanswer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Questionanswer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Questionanswer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Questionanswer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Questionanswer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Questionanswer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Questionanswer findOrCreate($search, callable $callback = null)
 */
class QuestionanswerTable extends Table
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

        $this->table('questionanswer');
        $this->displayField('answerid');
        $this->primaryKey('answerid');
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
            ->integer('answerid')
            ->allowEmpty('answerid', 'create');

        $validator
            ->integer('questionid')
            ->requirePresence('questionid', 'create')
            ->notEmpty('questionid');

        $validator
            ->integer('traineetsid')
            ->allowEmpty('traineetsid');

        $validator
            ->allowEmpty('description');

        return $validator;
    }
}
