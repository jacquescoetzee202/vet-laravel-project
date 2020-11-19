<?php

namespace App;

class CodeCracker
{   
    private $keys;

    public function __construct($string)
    {
        $characters = explode(" ",$string);
        $this->keys = $characters;
    }

    public function getKeys()
    {
        return $this->keys;
    }

    public function decrypt($string)
    {
        $result = '';
        $charArr = str_split($string);

        foreach($charArr as $char){
            if($char !== " "){
                $index = array_search($char, $this->keys);
                $ascii = $index += 97;
                $result .= chr($ascii);
            } else {
                $result .= " ";
            }
        }

        return $result;
    }
//ascii a-z 97-122


}