<?php
namespace App\Test\TestCase\View\Cell;

use App\View\Cell\AddressCell;
use Cake\TestSuite\TestCase;

/**
 * App\View\Cell\AddressCell Test Case
 */
class AddressCellTest extends TestCase
{

    /**
     * Request mock
     *
     * @var \Cake\Network\Request|\PHPUnit_Framework_MockObject_MockObject
     */
    public $request;

    /**
     * Response mock
     *
     * @var \Cake\Network\Response|\PHPUnit_Framework_MockObject_MockObject
     */
    public $response;

    /**
     * Test subject
     *
     * @var \App\View\Cell\AddressCell
     */
    public $Address;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->request = $this->getMockBuilder('Cake\Network\Request')->getMock();
        $this->response = $this->getMockBuilder('Cake\Network\Response')->getMock();
        $this->Address = new AddressCell($this->request, $this->response);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Address);

        parent::tearDown();
    }

    /**
     * Test display method
     *
     * @return void
     */
    public function testDisplay()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
