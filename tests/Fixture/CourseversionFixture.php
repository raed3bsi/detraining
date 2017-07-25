<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CourseversionFixture
 *
 */
class CourseversionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'courseversion';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'courseid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'versionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'versionseq' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'versionname' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'coursedescription' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'courseobjectives' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'coursegoals' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'serviceid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'documentid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'createdby' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'versionstatus' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'traininghours' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_courseversion_course_idx' => ['type' => 'index', 'columns' => ['courseid'], 'length' => []],
            'fk_courseversion_service_idx' => ['type' => 'index', 'columns' => ['serviceid'], 'length' => []],
            'fk_courseversion_document_idx' => ['type' => 'index', 'columns' => ['documentid'], 'length' => []],
            'fk_courseversion_owner_idx' => ['type' => 'index', 'columns' => ['createdby'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['versionid'], 'length' => []],
            'uq_versionname' => ['type' => 'unique', 'columns' => ['courseid', 'versionname'], 'length' => []],
            'uq_versionseq' => ['type' => 'unique', 'columns' => ['courseid', 'versionseq'], 'length' => []],
            'fk_courseversion_course' => ['type' => 'foreign', 'columns' => ['courseid'], 'references' => ['course', 'courseid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_courseversion_document' => ['type' => 'foreign', 'columns' => ['documentid'], 'references' => ['document', 'documentid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_courseversion_owner' => ['type' => 'foreign', 'columns' => ['createdby'], 'references' => ['user', 'userid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_courseversion_service' => ['type' => 'foreign', 'columns' => ['serviceid'], 'references' => ['service', 'serviceid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'versionid' => 1,
            'versionseq' => 1,
            'versionname' => 'Lorem ipsum dolor sit amet',
            'coursedescription' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'courseobjectives' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'coursegoals' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'serviceid' => 1,
            'documentid' => 1,
            'createdby' => 1,
            'versionstatus' => 1,
            'traininghours' => 1
        ],
    ];
}
