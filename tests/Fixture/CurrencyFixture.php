<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CurrencyFixture
 *
 */
class CurrencyFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'currency';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'currencyid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'currencycode' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'currencyname' => ['type' => 'string', 'length' => 40, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['currencyid'], 'length' => []],
            'currencyname_UNIQUE' => ['type' => 'unique', 'columns' => ['currencyname'], 'length' => []],
            'currencycode_UNIQUE' => ['type' => 'unique', 'columns' => ['currencycode'], 'length' => []],
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
            'currencyid' => 1,
            'currencycode' => 'Lorem ipsum dolor ',
            'currencyname' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
