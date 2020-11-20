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

    private function ascii($char)
    {
        $index = array_search($char, $this->keys);
        return $index += 97;
    } 

    public function decrypt($string)
    {
        $result = '';
        $charArr = str_split($string);

        foreach($charArr as $char){
            if($char !== " "){
                $result .= chr($this->ascii($char));
            } else {
                $result .= " ";
            }
        }

        return $result;
    }
//ascii a-z 97-122


}