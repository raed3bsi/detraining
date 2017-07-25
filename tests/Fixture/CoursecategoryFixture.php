<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CoursecategoryFixture
 *
 */
class CoursecategoryFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'coursecategory';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'categoryid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'parentcategory' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'categoryname' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ptestid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'placement test id', 'precision' => null, 'autoIncrement' => null],
        'serviceid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'departmentid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_coursecategory_department_idx' => ['type' => 'index', 'columns' => ['departmentid'], 'length' => []],
            'fk_coursecategory_parentcategory_idx' => ['type' => 'index', 'columns' => ['parentcategory'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['categoryid'], 'length' => []],
            'categoryname_UNIQUE' => ['type' => 'unique', 'columns' => ['categoryname'], 'length' => []],
            'ptestid_UNIQUE' => ['type' => 'unique', 'columns' => ['ptestid'], 'length' => []],
            'serviceid_UNIQUE' => ['type' => 'unique', 'columns' => ['serviceid'], 'length' => []],
            'fk_coursecategory_department' => ['type' => 'foreign', 'columns' => ['departmentid'], 'references' => ['department', 'departmentid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'fk_coursecategory_parentcategory' => ['type' => 'foreign', 'columns' => ['parentcategory'], 'references' => ['coursecategory', 'categoryid'], 'update' => 'noAction', 'delete' => 'setNull', 'length' => []],
            'fk_coursecategory_placementtest' => ['type' => 'foreign', 'columns' => ['ptestid'], 'references' => ['placementtest', 'ptestid'], 'update' => 'noAction', 'delete' => 'setNull', 'length' => []],
            'fk_coursecategory_service' => ['type' => 'foreign', 'columns' => ['serviceid'], 'references' => ['service', 'serviceid'], 'update' => 'noAction', 'delete' => 'setNull', 'length' => []],
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
            'categoryid' => 1,
            'parentcategory' => 1,
            'categoryname' => 'Lorem ipsum dolor sit amet',
            'ptestid' => 1,
            'serviceid' => 1,
            'departmentid' => 1
        ],
    ];
}
