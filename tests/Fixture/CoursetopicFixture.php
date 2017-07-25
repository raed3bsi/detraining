<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CoursetopicFixture
 *
 */
class CoursetopicFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'coursetopic';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'topicid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'versionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'parenttopicid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'previoustopicid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'traininghours' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'testid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'if a test is part of course outline it could be inserted as a topic with a reference to the default evaluation test', 'precision' => null, 'autoIncrement' => null],
        'topictitle' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'topicdescription' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_coursetopic_courseversion1_idx' => ['type' => 'index', 'columns' => ['versionid'], 'length' => []],
            'fk_coursetopic_coursetopic1_idx' => ['type' => 'index', 'columns' => ['parenttopicid'], 'length' => []],
            'fk_coursetopic_coursetopic2_idx' => ['type' => 'index', 'columns' => ['previoustopicid'], 'length' => []],
            'fk_coursetopic_evaltest_idx' => ['type' => 'index', 'columns' => ['testid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['topicid'], 'length' => []],
            'fk_coursetopic_coursetopic1' => ['type' => 'foreign', 'columns' => ['parenttopicid'], 'references' => ['coursetopic', 'topicid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_coursetopic_coursetopic2' => ['type' => 'foreign', 'columns' => ['previoustopicid'], 'references' => ['coursetopic', 'topicid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_coursetopic_courseversion1' => ['type' => 'foreign', 'columns' => ['versionid'], 'references' => ['courseversion', 'versionid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_coursetopic_evaltest' => ['type' => 'foreign', 'columns' => ['testid'], 'references' => ['evaltest', 'testid'], 'update' => 'noAction', 'delete' => 'setNull', 'length' => []],
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
            'topicid' => 1,
            'versionid' => 1,
            'parenttopicid' => 1,
            'previoustopicid' => 1,
            'traininghours' => 1,
            'testid' => 1,
            'topictitle' => 'Lorem ipsum dolor sit amet',
            'topicdescription' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
