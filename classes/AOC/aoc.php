<?php

namespace AOC;

class aoc
{

    var $source;
    var $msg;

/*
    function __construct($source)
    {
        $this->source = $source;
    }
*/
    public function readFile($fileName)
    {
       $file = fopen($fileName, "r") or die("couldn't open file");
       fgets($file);
       $data = [];
        foreach($file as $line){
            $data[] = $line;
        }
       return $data;

    }

    public function iterate($array){

    }

    public function readLines($filename){
        return file($filename, FILE_IGNORE_NEW_LINES);
    }
}