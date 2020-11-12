<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Models\Owner;

class ValidPhoneTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testValidPhone()
    {
        $validMobile = '07532390563';
        $nonvalidShort = '09869989';
        $nonvalidLetters = '07543489348R';
        $nonvalidLong = '0795838476849386749376';
        $validInternational = '+442077555333';

        $this->assertTrue(Owner::validPhoneNumber($validMobile));
        $this->assertTrue(Owner::validPhoneNumber($validInternational));
        $this->assertFalse(Owner::validPhoneNumber($nonvalidShort));
        $this->assertFalse(Owner::validPhoneNumber($nonvalidLetters));
        $this->assertFalse(Owner::validPhoneNumber($nonvalidLong));
    }
}
