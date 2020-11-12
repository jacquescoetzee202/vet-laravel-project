<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Owner;

class TelephoneLengthTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use RefreshDatabase;
     
    public function testTelephoneLength()
    {
        Owner::create([
            'first_name' => 'Jacques',
            'last_name' => 'Coetzee',
            'telephone' => '07532390563',
            'email' => 'jacquescoetzee91@gmail.com',
            'address_1' => '7 Chalks Road',
            'postcode' => 'BS5 9EN'
        ]);

        $firstOwner = Owner::first();
        $firstOwner->telephone = "0753239056399999999999999999999999";
        $firstOwner->save();

        $this->assertSame(strlen(Owner::first()->telephone),14);
    }
}
