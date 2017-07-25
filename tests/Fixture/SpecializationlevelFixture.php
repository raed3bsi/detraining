<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SpecializationlevelFixture
 *
 */
class SpecializationlevelFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'specializationlevel';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'slevelid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'levelno' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'levelname' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'specializationid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'duration' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'number of days', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_specializationlevel_specialization_idx' => ['type' => 'index', 'columns' => ['specializationid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['slevelid'], 'length' => []],
            'uq_specializationlevel_name' => ['type' => 'unique', 'columns' => ['levelname', 'specializationid'], 'length' => []],
            'uq_specializationlevel_no' => ['type' => 'unique', 'columns' => ['levelno', 'specializationid'], 'length' => []],
            'fk_specializationlevel_specialization' => ['type' => 'foreign', 'columns' => ['specializationid'], 'references' => ['specialization', 'specializationid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'slevelid' => 1,
            'levelno' => 1,
            'levelname' => 'Lorem ipsum dolor sit amet',
            'specializationid' => 1,
            'duration' => 1
        ],
    ];
}
