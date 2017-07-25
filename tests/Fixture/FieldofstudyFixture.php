<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FieldofstudyFixture
 *
 */
class FieldofstudyFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'fieldofstudy';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'fieldofstudyid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fieldofstudyname' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['fieldofstudyid'], 'length' => []],
            'fieldofstudyname_UNIQUE' => ['type' => 'unique', 'columns' => ['fieldofstudyname'], 'length' => []],
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
            'fieldofstudyid' => 1,
            'fieldofstudyname' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
