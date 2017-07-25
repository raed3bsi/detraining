<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SgrouptypeFixture
 *
 */
class SgrouptypeFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'sgrouptype';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'sgtypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'sgtypename' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sgtypecode' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['sgtypeid'], 'length' => []],
            'sgtypename_UNIQUE' => ['type' => 'unique', 'columns' => ['sgtypename'], 'length' => []],
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
            'sgtypeid' => 1,
            'sgtypename' => 'Lorem ipsum dolor sit amet',
            'sgtypecode' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
