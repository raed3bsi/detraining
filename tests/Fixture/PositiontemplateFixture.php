<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PositiontemplateFixture
 *
 */
class PositiontemplateFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'positiontemplate';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'jobid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'butypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'rootunitid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'not all business units of the specified type, only those descends from the specified root unit', 'precision' => null, 'autoIncrement' => null],
        'instances' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => 'maximum number of assignments per business unit.', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_positiontemplate_job_idx' => ['type' => 'index', 'columns' => ['jobid'], 'length' => []],
            'fk_positiontemplate_butype_idx' => ['type' => 'index', 'columns' => ['butypeid'], 'length' => []],
            'fk_positiontemplate_businessunit_idx' => ['type' => 'index', 'columns' => ['rootunitid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_positiontemplate_businessunit' => ['type' => 'foreign', 'columns' => ['rootunitid'], 'references' => ['businessunit', 'businessunitid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'fk_positiontemplate_butype' => ['type' => 'foreign', 'columns' => ['butypeid'], 'references' => ['businessunittype', 'butypeid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'fk_positiontemplate_job' => ['type' => 'foreign', 'columns' => ['jobid'], 'references' => ['abstractjob', 'jobid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'jobid' => 1,
            'butypeid' => 1,
            'rootunitid' => 1,
            'instances' => 1
        ],
    ];
}
