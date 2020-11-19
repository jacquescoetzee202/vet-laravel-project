<?php

namespace Tests\Unit;

use App\CodeCracker;
use PHPUnit\Framework\TestCase;

class CodeCrackerTest extends TestCase
{
    public function testconstructor()
    {
        $input = "x t y z";
        $cracker = new CodeCracker($input);
        $this->assertSame(["x","t","y","z"],$cracker->getKeys());
    }

    public function testSingleKey()
    {
        $input = "x";
        $cracker = new CodeCracker($input);
        $this->assertSame("a",$cracker->decrypt("x"));
    }
    
    public function testTwoKey()
    {
        $input = "x #";
        $cracker = new CodeCracker($input);
        $this->assertSame("b",$cracker->decrypt("#"));
    }
    
    public function testWord()
    {
        $input = "x #";
        $cracker = new CodeCracker($input);
        $this->assertSame("baba",$cracker->decrypt("#x#x"));
    }
    
    public function testFull()
    {
        $cracker = new CodeCracker("! ) # ( . * % & > < @ a b c d e f g h i j k l m n o");
        $this->assertSame("hello mum", $cracker->decrypt("&.aad bjb"));
    }

}
