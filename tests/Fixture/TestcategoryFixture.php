<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TestcategoryFixture
 *
 */
class TestcategoryFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'testcategory';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'tcategoryid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'tcategoryname' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ishomework' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => 'wither the test of this category is a homework or taken within a session', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['tcategoryid'], 'length' => []],
            'tcategoryname_UNIQUE' => ['type' => 'unique', 'columns' => ['tcategoryname'], 'length' => []],
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
            'tcategoryid' => 1,
            'tcategoryname' => 'Lorem ipsum dolor sit amet',
            'ishomework' => 1
        ],
    ];
}
