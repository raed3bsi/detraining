<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CityFixture
 *
 */
class CityFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'city';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'cityid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cityname' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'countryid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_city_country_idx' => ['type' => 'index', 'columns' => ['countryid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['cityid'], 'length' => []],
            'cityname_UNIQUE' => ['type' => 'unique', 'columns' => ['cityname'], 'length' => []],
            'fk_city_country' => ['type' => 'foreign', 'columns' => ['countryid'], 'references' => ['country', 'countryid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'cityid' => 1,
            'cityname' => 'Lorem ipsum dolor sit amet',
            'countryid' => 1
        ],
    ];
}
