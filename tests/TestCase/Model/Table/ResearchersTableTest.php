<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResearchersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResearchersTable Test Case
 */
class ResearchersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResearchersTable
     */
    protected $Researchers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Researchers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Researchers') ? [] : ['className' => ResearchersTable::class];
        $this->Researchers = $this->getTableLocator()->get('Researchers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Researchers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ResearchersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
