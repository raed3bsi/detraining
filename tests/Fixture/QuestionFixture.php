<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuestionFixture
 *
 */
class QuestionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'question';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'questionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'parent_questionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'difficultyid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'questiondescription' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'qtypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'topicid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'the topic which the question assess trainee\'s understanding of it (optional)', 'precision' => null, 'autoIncrement' => null],
        'points' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'negativepoints' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => ''],
        'pointsfactor' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '1', 'comment' => 'if the question has a number of sub-questions (answers) then the points could be calculated for the sub-questions or for the master question (in the former case the factor would be 0 while in the later it would be 1)', 'precision' => null],
        'owner' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_question_question1_idx' => ['type' => 'index', 'columns' => ['parent_questionid'], 'length' => []],
            'fk_question_questiondifficulty1_idx' => ['type' => 'index', 'columns' => ['difficultyid'], 'length' => []],
            'fk_question_qtype_idx' => ['type' => 'index', 'columns' => ['qtypeid'], 'length' => []],
            'fk_question_topic_idx' => ['type' => 'index', 'columns' => ['topicid'], 'length' => []],
            'fk_question_owner_idx' => ['type' => 'index', 'columns' => ['owner'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['questionid'], 'length' => []],
            'fk_question_owner' => ['type' => 'foreign', 'columns' => ['owner'], 'references' => ['user', 'userid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_question_qtype' => ['type' => 'foreign', 'columns' => ['qtypeid'], 'references' => ['questiontype', 'qtypeid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_question_question1' => ['type' => 'foreign', 'columns' => ['parent_questionid'], 'references' => ['question', 'questionid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_question_questiondifficulty1' => ['type' => 'foreign', 'columns' => ['difficultyid'], 'references' => ['questiondifficulty', 'difficultyid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_question_topic' => ['type' => 'foreign', 'columns' => ['topicid'], 'references' => ['coursetopic', 'topicid'], 'update' => 'noAction', 'delete' => 'setNull', 'length' => []],
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
            'questionid' => 1,
            'parent_questionid' => 1,
            'difficultyid' => 1,
            'questiondescription' => 'Lorem ipsum dolor sit amet',
            'qtypeid' => 1,
            'topicid' => 1,
            'points' => 1,
            'negativepoints' => 1,
            'pointsfactor' => 1,
            'owner' => 1
        ],
    ];
}
