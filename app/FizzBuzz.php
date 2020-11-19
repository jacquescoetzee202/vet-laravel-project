<?php

namespace App;

class FizzBuzz
{
    public function forNumber(int $num) : string
    {
        $result = '';
        if($num % 3 === 0){
            $result .= "Fizz";
        }
        if($num % 5 === 0){
            $result .= "Buzz";
        }
        if($num % 7 === 0){
            $result .= "Rarr";
        }
        return $result === "" ? strval($num) : $result;
    }
}