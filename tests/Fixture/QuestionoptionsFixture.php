<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuestionoptionsFixture
 *
 */
class QuestionoptionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'optionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'questionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'optiondesctription' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nextoption' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_questionoptions_question1_idx' => ['type' => 'index', 'columns' => ['questionid'], 'length' => []],
            'fk_questionoptions_nextoption_idx' => ['type' => 'index', 'columns' => ['nextoption'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['optionid'], 'length' => []],
            'fk_questionoptions_nextoption' => ['type' => 'foreign', 'columns' => ['nextoption'], 'references' => ['questionoptions', 'optionid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_questionoptions_question1' => ['type' => 'foreign', 'columns' => ['questionid'], 'references' => ['question', 'questionid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'optionid' => 1,
            'questionid' => 1,
            'optiondesctription' => 'Lorem ipsum dolor sit amet',
            'nextoption' => 1
        ],
    ];
}
