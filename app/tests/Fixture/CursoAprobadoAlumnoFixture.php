<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CursoAprobadoAlumnoFixture
 */
class CursoAprobadoAlumnoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'curso_aprobado_alumno';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'alumno_id' => 1,
                'semestre_id' => 1,
                'seccion_id' => 1,
                'curso_id' => 1,
            ],
        ];
        parent::init();
    }
}
