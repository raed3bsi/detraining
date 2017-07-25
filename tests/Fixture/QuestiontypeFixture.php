<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuestiontypeFixture
 *
 */
class QuestiontypeFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'questiontype';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'qtypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'qtypename' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'editelement' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'the element which displays the question to an instructor who would edit it', 'precision' => null, 'fixed' => null],
        'viewelement' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'the element which renders the question for a trainee who would answer it.', 'precision' => null, 'fixed' => null],
        'serializationhandler' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'a handler which converts question answering view form into answers data and vice versa (converts answering data into view form).', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['qtypeid'], 'length' => []],
            'qtypename_UNIQUE' => ['type' => 'unique', 'columns' => ['qtypename'], 'length' => []],
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
            'qtypeid' => 1,
            'qtypename' => 'Lorem ipsum dolor sit amet',
            'editelement' => 'Lorem ipsum dolor ',
            'viewelement' => 'Lorem ipsum dolor ',
            'serializationhandler' => 'Lorem ipsum dolor '
        ],
    ];
}
