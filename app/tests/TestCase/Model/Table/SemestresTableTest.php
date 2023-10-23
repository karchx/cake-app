<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SemestresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SemestresTable Test Case
 */
class SemestresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SemestresTable
     */
    protected $Semestres;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Semestres',
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
        $config = $this->getTableLocator()->exists('Semestres') ? [] : ['className' => SemestresTable::class];
        $this->Semestres = $this->getTableLocator()->get('Semestres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Semestres);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SemestresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
