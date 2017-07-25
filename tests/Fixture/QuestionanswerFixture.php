<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuestionanswerFixture
 *
 */
class QuestionanswerFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'questionanswer';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'answerid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'questionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'traineetsid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'description' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_questionanswer_question1_idx' => ['type' => 'index', 'columns' => ['questionid'], 'length' => []],
            'fk_questionanswer_traineetestsession_idx' => ['type' => 'index', 'columns' => ['traineetsid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['answerid'], 'length' => []],
            'fk_questionanswer_question1' => ['type' => 'foreign', 'columns' => ['questionid'], 'references' => ['question', 'questionid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_questionanswer_traineetestsession' => ['type' => 'foreign', 'columns' => ['traineetsid'], 'references' => ['trainee_has_testsession', 'traineetsid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'answerid' => 1,
            'questionid' => 1,
            'traineetsid' => 1,
            'description' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
