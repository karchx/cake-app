<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Semestre Entity
 *
 * @property int $id
 * @property string $descripcion
 *
 * @property \App\Model\Entity\CursoAprobadoAlumno[] $curso_aprobado_alumno
 */
class Semestre extends Entity
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
        'descripcion' => true,
        'curso_aprobado_alumno' => true,
    ];
}
