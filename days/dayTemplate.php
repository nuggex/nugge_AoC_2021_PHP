<?php

require 'config.php';

$config = parse_ini_file(CONFIG_DIR . '/aoc.ini');

$aoc = new AOC\aoc();

$data = $aoc->readLines(DATA_DIR . '/dayXXXX.txt');
