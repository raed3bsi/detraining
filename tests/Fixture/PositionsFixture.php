<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PositionsFixture
 *
 */
class PositionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'positionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'positionname' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sgroupid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'jobid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'businessunitid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'maxnoinstances' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => '0', 'comment' => 'maximum number of instances with 0 means infinity', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_positions_job_idx' => ['type' => 'index', 'columns' => ['jobid'], 'length' => []],
            'fk_positions_businessunit_idx' => ['type' => 'index', 'columns' => ['businessunitid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['positionid'], 'length' => []],
            'sgroupid_UNIQUE' => ['type' => 'unique', 'columns' => ['sgroupid'], 'length' => []],
            'fk_positions_businessunit' => ['type' => 'foreign', 'columns' => ['businessunitid'], 'references' => ['businessunit', 'businessunitid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'fk_positions_job' => ['type' => 'foreign', 'columns' => ['jobid'], 'references' => ['abstractjob', 'jobid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'fk_positions_securitygroup' => ['type' => 'foreign', 'columns' => ['sgroupid'], 'references' => ['securitygroup', 'sgroupid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'positionid' => 1,
            'positionname' => 'Lorem ipsum dolor sit amet',
            'sgroupid' => 1,
            'jobid' => 1,
            'businessunitid' => 1,
            'maxnoinstances' => 1
        ],
    ];
}
