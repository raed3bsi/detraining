<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DepartmentFixture
 *
 */
class DepartmentFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'department';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'departmentid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'departmentname' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'parentdeptid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'depttypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'bunitid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_department_businessunit_idx' => ['type' => 'index', 'columns' => ['bunitid'], 'length' => []],
            'fk_department_depttype_idx' => ['type' => 'index', 'columns' => ['depttypeid'], 'length' => []],
            'fk_department_parentdept_idx' => ['type' => 'index', 'columns' => ['parentdeptid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['departmentid'], 'length' => []],
            'uq_department_nameparent' => ['type' => 'unique', 'columns' => ['departmentname', 'parentdeptid'], 'length' => []],
            'fk_department_businessunit' => ['type' => 'foreign', 'columns' => ['bunitid'], 'references' => ['businessunit', 'businessunitid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_department_depttype' => ['type' => 'foreign', 'columns' => ['depttypeid'], 'references' => ['departmenttype', 'depttypeid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'fk_department_parentdept' => ['type' => 'foreign', 'columns' => ['parentdeptid'], 'references' => ['department', 'departmentid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'departmentid' => 1,
            'departmentname' => 'Lorem ipsum dolor sit amet',
            'parentdeptid' => 1,
            'depttypeid' => 1,
            'bunitid' => 1
        ],
    ];
}
