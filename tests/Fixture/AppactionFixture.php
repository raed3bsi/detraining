<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppactionFixture
 *
 */
class AppactionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'appaction';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'acoid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'actionname' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'actiontype' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'dependon' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'displayname' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'affectedprops' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'properties that would be affected they should be a subset of the model select clause.', 'precision' => null, 'fixed' => null],
        'urlpattern' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_appaction_accesscontrolobject_idx' => ['type' => 'index', 'columns' => ['acoid'], 'length' => []],
            'fk_appaction_dependson_idx' => ['type' => 'index', 'columns' => ['dependon'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_appaction_accesscontrolobject' => ['type' => 'foreign', 'columns' => ['acoid'], 'references' => ['accesscontrolobject', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_appaction_dependson' => ['type' => 'foreign', 'columns' => ['dependon'], 'references' => ['appaction', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => 1,
            'acoid' => 1,
            'actionname' => 'Lorem ipsum dolor sit amet',
            'actiontype' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'dependon' => 1,
            'displayname' => 'Lorem ipsum dolor sit amet',
            'affectedprops' => 'Lorem ipsum dolor sit amet',
            'urlpattern' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
