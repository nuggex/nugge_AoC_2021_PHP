<?php

require 'config.php';

$config = parse_ini_file(CONFIG_DIR . '/aoc.ini');

$aoc = new AOC\aoc();

$data = $aoc->readLines(DATA_DIR . '/day3_a.txt');


function day3_part1($data): array
{
    $bits = array_fill(0, 12, 0);
    $epsilon = array_fill(0, 12, 1);
    $gamma = $bits;
    foreach ($data as $row) {
        foreach (str_split($row) as $key => $value) {
            $bits[$key] += $value;
        }
    }
    foreach ($bits as $key => $b) {
        if ($b > sizeof($data) / 2) {
            $epsilon[$key] = 0;
            $gamma[$key] = 1;
        }
    }
    return [$epsilon, $gamma];

}

function countNumbers($data, $index): array
{
    $countOnes = 0;
    $countZeros = 0;
    foreach ($data as $d) {
        if ($d[$index] === "1") {
            $countOnes++;
        }
        if ($d[$index] === "0") {
            $countZeros++;
        }
    }
    return [$countOnes, $countZeros];
}

function day3_part2($data)
{
    $index = 0;
    $shields = $data;
    while (sizeof($data) > 1) {

        $countOnes = countNumbers($data, $index)[0];
        $countZeros = countNumbers($data, $index)[1];
        if ($countZeros > $countOnes) {
            $filter = 1;
        } else {
            $filter = 0;
        }
        foreach ($data as $k => $d) {
            $values = str_split($d);
            if ($values[$index] == $filter) {
                unset($data[$k]);
            }
        }
        $index++;
    }
    $index = 0;

    while (sizeof($shields) > 1) {

        $countOnes = countNumbers($shields, $index)[0];
        $countZeros = countNumbers($shields, $index)[1];
        if ($countZeros < $countOnes || $countZeros === $countOnes) {
            $filter = 1;
        } else {
            $filter = 0;
        }
        foreach ($shields as $k => $d) {
            $values = str_split($d);
            if ($values[$index] == $filter) {
                unset($shields[$k]);
            }
        }
        $index++;
    }
    $d = array_values($data);
    $s = array_values($shields);

    return bindec($d[0]) * bindec($s[0]);

}

echo "\npart1: " . bindec(implode(day3_part1($data)[0])) * bindec(implode(day3_part1($data)[1]));

echo "\npart2: " . (day3_part2($data)). "\n";