<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CursoAprobadoAlumno Entity
 *
 * @property int $id
 * @property int|null $alumno_id
 * @property int|null $semestre_id
 * @property int|null $seccion_id
 * @property int|null $curso_id
 *
 * @property \App\Model\Entity\Alumno $alumno
 * @property \App\Model\Entity\Semestre $semestre
 * @property \App\Model\Entity\Seccione $seccione
 * @property \App\Model\Entity\Curso $curso
 */
class CursoAprobadoAlumno extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'alumno_id' => true,
        'semestre_id' => true,
        'seccion_id' => true,
        'curso_id' => true,
        'nota' => true,
        'alumno' => true,
        'semestre' => true,
        'seccion' => true,
        'curso' => true,
    ];
}
