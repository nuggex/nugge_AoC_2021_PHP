<?php

require 'config.php';

$config = parse_ini_file(CONFIG_DIR . '/aoc.ini');

$aoc = new AOC\aoc();

$data = $aoc->readLines(DATA_DIR . '/day3_a.txt');


function day3_part1($data)
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

function day3_part2($data,$count)
{
    $castle = day3_part1($data);
    $shield = $castle[1];
    $oxygen = $data;
    $co = $data;

    while(sizeof($data)>1){
        foreach($data as $d){
            $values = str_split($d);
            foreach($values as $value){
                if($)
            }
        }
    }
    foreach ($castle[0] as $keyData => $d) {
        foreach ($data as $key => $value) {
            $count = substr_count($value, $count);
            $r = str_split($value);
            $v = intval($r[$keyData]);

            if($d != $shield[$keyData]) {


                if (sizeof($co) > 1) {
                    if ($v === $d) {
                        //echo "hep";
                        unset($co[$key]);
                    }
                }
                if (sizeof($oxygen) > 1) {

                    if ($v !== $d) {
                        //echo "hop";
                        unset($oxygen[$key]);
                    }
                }
            }
        }
    }

    echo "co:" . bindec(array_values($co)[0]);
    echo "oxy: " . bindec(array_values($oxygen)[0]);
    echo "answer: ". bindec(array_values($co)[0]) * bindec(array_values($oxygen)[0]);
//var_dump($co);
// var_dump($oxygen);
    /*
    $commonBit = [];
    foreach($data as $row){
        $values = array_count_values(str_split($row));
        arsort($values);
        $commonBit = array_slice(array_keys($values),0,12,true);
    }
    foreach ($data as $row){
        foreach(str_split($row) as $value){

        }
    }'*/
}

echo "part1: " . bindec(implode(day3_part1($data)[0])) * bindec(implode(day3_part1($data)[1]));

day3_part2($data);