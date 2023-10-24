<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\CursoAprobadoAlumnoController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\CursoAprobadoAlumnoController Test Case
 *
 * @uses \App\Controller\CursoAprobadoAlumnoController
 */
class CursoAprobadoAlumnoControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.CursoAprobadoAlumno',
        'app.Alumnos',
        'app.Semestres',
        'app.Secciones',
        'app.Cursos',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\CursoAprobadoAlumnoController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\CursoAprobadoAlumnoController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\CursoAprobadoAlumnoController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\CursoAprobadoAlumnoController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\CursoAprobadoAlumnoController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
