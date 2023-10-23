<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SeccionesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SeccionesTable Test Case
 */
class SeccionesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SeccionesTable
     */
    protected $Secciones;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Secciones',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Secciones') ? [] : ['className' => SeccionesTable::class];
        $this->Secciones = $this->getTableLocator()->get('Secciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Secciones);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SeccionesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
