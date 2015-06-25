<?php
// Iniciando SESSION
session_start();

// Require arquivo autoloader
require __DIR__ . '/autoloader.php';

use Lib\Config;

// Carregando configuracoes
Config::carregar();