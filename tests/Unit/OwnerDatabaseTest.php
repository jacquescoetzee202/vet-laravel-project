<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Owner;

class OwnerDatabaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function testDatabase()
    {
        Owner::create([
            'first_name' => 'Jacques',
            'last_name' => 'Coetzee',
            'telephone' => '07532390563',
            'email' => 'jacquescoetzee91@gmail.com',
            'address_1' => '7 Chalks Road',
            'postcode' => 'BS5 9EN'
        ]);

        $ownerFromDB = Owner::first();

        $this->assertSame('Jacques', $ownerFromDB->first_name);
        
        $this->assertSame('jacquescoetzee91@gmail.com', $ownerFromDB->email);
    }

    public function testEmailExists()
    {
        Owner::create([
            'first_name' => 'Jacques',
            'last_name' => 'Coetzee',
            'telephone' => '07532390563',
            'email' => 'jacquescoetzee91@gmail.com',
            'address_1' => '7 Chalks Road',
            'postcode' => 'BS5 9EN'
        ]);

        $ownerFromDB = Owner::first();

        $this->assertTrue($ownerFromDB->emailExists('jacquescoetzee91@gmail.com'));

        $this->assertFalse($ownerFromDB->emailExists('made-up@gmail.com'));

    }


}
