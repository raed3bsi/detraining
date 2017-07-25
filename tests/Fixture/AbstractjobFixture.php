<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AbstractjobFixture
 *
 */
class AbstractjobFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'abstractjob';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'jobid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'jobname' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'jobtooltip' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sgroupid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['jobid'], 'length' => []],
            'jobname_UNIQUE' => ['type' => 'unique', 'columns' => ['jobname'], 'length' => []],
            'sgroupid_UNIQUE' => ['type' => 'unique', 'columns' => ['sgroupid'], 'length' => []],
            'fk_absjob_securitygroup' => ['type' => 'foreign', 'columns' => ['sgroupid'], 'references' => ['securitygroup', 'sgroupid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'jobid' => 1,
            'jobname' => 'Lorem ipsum dolor sit amet',
            'jobtooltip' => 'Lorem ipsum dolor sit amet',
            'sgroupid' => 1
        ],
    ];
}
