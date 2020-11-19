<?php

namespace App;

class FizzBuzz
{
    private $dict = [
        3 => "Fizz",
        5 => "Buzz",
        7 => "Rarr"
    ];

    public function forNumber(int $num) : string
    {
        $result = '';
        
        foreach($this->dict as $key => $string){
            if($num % $key === 0){
                $result .= $string;
            }
        }
        
        return $result === "" ? strval($num) : $result;
    }
}