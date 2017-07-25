<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EvaltestQuestionsFixture
 *
 */
class EvaltestQuestionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'testid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'questionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'questionnumber' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_testquestions_question_idx' => ['type' => 'index', 'columns' => ['questionid'], 'length' => []],
            'fk_testquestions_evaltest_idx' => ['type' => 'index', 'columns' => ['testid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_testquestions_uq' => ['type' => 'unique', 'columns' => ['testid', 'questionid'], 'length' => []],
            'fk_testquestions_evaltest' => ['type' => 'foreign', 'columns' => ['testid'], 'references' => ['evaltest', 'testid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'fk_testquestions_question' => ['type' => 'foreign', 'columns' => ['questionid'], 'references' => ['question', 'questionid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'id' => 1,
            'testid' => 1,
            'questionid' => 1,
            'questionnumber' => 1
        ],
    ];
}
