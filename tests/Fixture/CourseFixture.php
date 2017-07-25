<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CourseFixture
 *
 */
class CourseFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'course';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'courseid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'categoryid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'coursenumber' => ['type' => 'string', 'length' => 25, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'coursename' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'coursestatus' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'documentid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'createdby' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'lastversion' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_course_document_idx' => ['type' => 'index', 'columns' => ['documentid'], 'length' => []],
            'fk_course_owner_idx' => ['type' => 'index', 'columns' => ['createdby'], 'length' => []],
            'fk_course_coursecategory_idx' => ['type' => 'index', 'columns' => ['categoryid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['courseid'], 'length' => []],
            'coursenumber_UNIQUE' => ['type' => 'unique', 'columns' => ['coursenumber'], 'length' => []],
            'coursename_UNIQUE' => ['type' => 'unique', 'columns' => ['coursename'], 'length' => []],
            'fk_course_coursecategory' => ['type' => 'foreign', 'columns' => ['categoryid'], 'references' => ['coursecategory', 'categoryid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_course_document' => ['type' => 'foreign', 'columns' => ['documentid'], 'references' => ['document', 'documentid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_course_owner' => ['type' => 'foreign', 'columns' => ['createdby'], 'references' => ['user', 'userid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'courseid' => 1,
            'categoryid' => 1,
            'coursenumber' => 'Lorem ipsum dolor sit a',
            'coursename' => 'Lorem ipsum dolor sit amet',
            'coursestatus' => 1,
            'documentid' => 1,
            'createdby' => 1,
            'lastversion' => 1
        ],
    ];
}
