<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DepartmenttypeFixture
 *
 */
class DepartmenttypeFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'departmenttype';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'depttypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'depttypename' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'subtypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['depttypeid'], 'length' => []],
            'depttypename_UNIQUE' => ['type' => 'unique', 'columns' => ['depttypename'], 'length' => []],
            'subtypeid_UNIQUE' => ['type' => 'unique', 'columns' => ['subtypeid'], 'length' => []],
            'fk_depttype_subtype' => ['type' => 'foreign', 'columns' => ['subtypeid'], 'references' => ['departmenttype', 'depttypeid'], 'update' => 'noAction', 'delete' => 'setNull', 'length' => []],
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
            'depttypeid' => 1,
            'depttypename' => 'Lorem ipsum dolor sit amet',
            'subtypeid' => 1
        ],
    ];
}
