<?php

// Path ke front controller
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Lokasi Paths.php
$pathsPath = realpath(FCPATH . 'app/Config/Paths.php');

if ($pathsPath === false) {
    exit('Paths.php not found');
}

// Load Paths
require $pathsPath;

$paths = new Config\Paths();

// Boot CI4 (versi baru)
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'Boot.php';

exit(CodeIgniter\Boot::bootWeb($paths));
