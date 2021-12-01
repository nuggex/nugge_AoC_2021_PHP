<?php

define('ROOT_DIR', dirname(__FILE__));
const CONFIG_DIR = ROOT_DIR . '/config';
const CONFIG_FILE = CONFIG_DIR . '/aoc.ini';
const CLASSES_DIR = ROOT_DIR . '/classes/';
const DATA_DIR = ROOT_DIR . '/data/';

function aoc_autoload($className)
{
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = CLASSES_DIR . $className . '.php';
    if (is_file($file)) {
        require_once($file);
    }
}

spl_autoload_register('aoc_autoload');
