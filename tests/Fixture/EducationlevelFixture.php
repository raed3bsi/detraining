<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EducationlevelFixture
 *
 */
class EducationlevelFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'educationlevel';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'educationlevelid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'educationlevelname' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['educationlevelid'], 'length' => []],
            'educationlevelname_UNIQUE' => ['type' => 'unique', 'columns' => ['educationlevelname'], 'length' => []],
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
            'educationlevelid' => 1,
            'educationlevelname' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
