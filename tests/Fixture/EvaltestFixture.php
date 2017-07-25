<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EvaltestFixture
 *
 */
class EvaltestFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'evaltest';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'testid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'testduration' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'duration in hours or days', 'precision' => null, 'autoIncrement' => null],
        'durationunitfactor' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '1 for hours and 24 for days', 'precision' => null, 'autoIncrement' => null],
        'tcategoryid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'testtitle' => ['type' => 'string', 'length' => 60, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'testdescription' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_evaltest_testcategory_idx' => ['type' => 'index', 'columns' => ['tcategoryid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['testid'], 'length' => []],
            'fk_evaltest_testcategory' => ['type' => 'foreign', 'columns' => ['tcategoryid'], 'references' => ['testcategory', 'tcategoryid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'testid' => 1,
            'testduration' => 1,
            'durationunitfactor' => 1,
            'tcategoryid' => 1,
            'testtitle' => 'Lorem ipsum dolor sit amet',
            'testdescription' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
