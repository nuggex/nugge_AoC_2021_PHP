<?php

require 'config.php';

$config = parse_ini_file(CONFIG_DIR . '/aoc.ini');

$aoc = new AOC\aoc();

$data = $aoc->readLines(DATA_DIR . '/day2_a.txt');


function day2part1($data)
{
    $depth = 0;
    $horizontal = 0;

    foreach ($data as $command) {
        $d = explode(" ", $command);
        switch ($d[0]) {
            case "forward":
                $horizontal += $d[1];
                break;
            case "down":
                $depth += $d[1];
                break;
            case "up":
                $depth -= $d[1];
                break;
        }
    }
    return $depth * $horizontal;
}



function day2part2($data){

    $depth = 0;
    $horizontal = 0;
    $aim = 0;

    foreach ($data as $command) {
        $d = explode(" ", $command);
        switch ($d[0]) {
            case "forward":
                $horizontal += $d[1];
                $depth += $aim*$d[1];
                break;
            case "down":
                $aim += $d[1];
                break;
            case "up":
                $aim -= $d[1];
                break;
        }
    }
    return $depth * $horizontal;
}


echo "part1: " . day2part1($data) . " \n";

echo "part2: " . day2part2($data) . " \n";
