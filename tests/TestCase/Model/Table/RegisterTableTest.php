<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequestsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequestsTable Test Case
 */
class RegisterTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RequestsTable
     */
    protected $Register;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Request',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Request') ? [] : ['className' => RequestsTable::class];
        $this->Register = $this->getTableLocator()->get('Request', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Register);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RequestsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
