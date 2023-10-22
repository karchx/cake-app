<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Carrera Entity
 *
 * @property int $id
 * @property string $descripcion
 *
 * @property \App\Model\Entity\Alumno[] $alumnos
 */
class Carrera extends Entity
{
    protected array $_accessible = [
        'descripcion' => true,
    ];
}
