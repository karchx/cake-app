<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlumnosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlumnosTable Test Case
 */
class AlumnosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AlumnosTable
     */
    protected $Alumnos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Alumnos',
        'app.Carreras',
        'app.CursoAprobadoAlumno',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Alumnos') ? [] : ['className' => AlumnosTable::class];
        $this->Alumnos = $this->getTableLocator()->get('Alumnos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Alumnos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AlumnosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AlumnosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
