<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Alumno Entity
 *
 * @property int $id
 * @property string $nombres
 * @property string $apellidos
 * @property \Cake\I18n\Date $fecha_nacimiento
 * @property string $fotografia
 * @property int|null $carrera_id
 *
 * @property \App\Model\Entity\Carrera $carrera
 * @property \App\Model\Entity\CursoAprobadoAlumno[] $curso_aprobado_alumno
 */
class Alumno extends Entity
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
        'nombres' => true,
        'apellidos' => true,
        'fecha_nacimiento' => true,
        'fotografia' => true,
        'carrera_id' => true,
        'carrera' => true,
        'curso_aprobado_alumno' => true,
    ];
}
