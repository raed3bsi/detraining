<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CoursematerialFixture
 *
 */
class CoursematerialFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'coursematerial';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'materialid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'topicid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'materialfile' => ['type' => 'string', 'length' => 300, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'file name including file path', 'precision' => null, 'fixed' => null],
        'materialname' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mtypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'filetype' => ['type' => 'string', 'length' => 60, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_coursematerial_coursetopic1_idx' => ['type' => 'index', 'columns' => ['topicid'], 'length' => []],
            'fk_coursematerial_materialtype_idx' => ['type' => 'index', 'columns' => ['mtypeid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['materialid'], 'length' => []],
            'fk_coursematerial_coursetopic1' => ['type' => 'foreign', 'columns' => ['topicid'], 'references' => ['coursetopic', 'topicid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_coursematerial_materialtype' => ['type' => 'foreign', 'columns' => ['mtypeid'], 'references' => ['materialtype', 'mtypeid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'materialid' => 1,
            'topicid' => 1,
            'materialfile' => 'Lorem ipsum dolor sit amet',
            'materialname' => 'Lorem ipsum dolor sit amet',
            'mtypeid' => 1,
            'filetype' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
