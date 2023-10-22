<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AlumnosFixture
 */
class AlumnosFixture extends TestFixture
{
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
                'nombres' => 'Lorem ipsum dolor sit amet',
                'apellidos' => 'Lorem ipsum dolor sit amet',
                'fecha_nacimiento' => '2023-10-22',
                'fotografia' => 'Lorem ipsum dolor sit amet',
                'carrera_id' => 1,
            ],
        ];
        parent::init();
    }
}
