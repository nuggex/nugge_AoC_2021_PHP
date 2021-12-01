<?php

require 'config.php';

$config = parse_ini_file(CONFIG_DIR . '/aoc.ini');

$aoc = new AOC\aoc();

$data = $aoc->readLines(DATA_DIR . '/day1_a.txt');


function day1part1($data)
{

    $counter = 0;

    $last = $data[0];


    foreach ($data as $value) {
        if ($last < $value) {
            $counter++;
        }
        $last = $value;
    }

    echo "Found " . $counter;

}


function day1part2($data)
{
    $newArray = [];
    $sum = 0;
    foreach ($data as $key => $row) {
        if ($key < sizeof($data) - 2) {
            $sum = $row + $data[$key + 1] + $data[$key + 2];
        }
        $newArray[] = $sum;
    }
    day1part1($newArray);
}

day1part2($data);