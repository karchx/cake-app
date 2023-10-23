<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin-top: 15px;
        }

        .sidebar li {
            padding: 10px;
        }

        .sidebar li>a {
            cursor: pointer;
        }

        .main {
            margin-left: 260px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <ul>
            <li>
                <a href="carrera">Carreras</a>
            </li>
            <li>
                <a href="curso">Cursos</a>
            </li>
            <li>
                <a href="semestre">Semestres</a>
            </li>
            <li>
                <a href="seccion">Secciones</a>
            </li>
            <li>
                <a href="alumno">Alumnos</a>
            </li>
        </ul>
    </div>
    <nav class="top-nav">
        <div class="top-nav-title">
        </div>
        <div class="top-nav-links">
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>

</html>
