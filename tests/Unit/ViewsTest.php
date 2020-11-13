<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Owner;

class ViewsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testViews()
    {
        Owner::create([
            'first_name' => 'Jacques',
            'last_name' => 'Coetzee',
            'telephone' => '07532390563',
            'email' => 'jacquescoetzee91@gmail.com',
            'address_1' => '7 Chalks Road',
            'postcode' => 'BS5 9EN'
        ]);

        $this->get('/')->assertViewIs("welcome");
        $this->get('/owners')->assertViewIs("owners.index");
        $this->get('/owners/1')->assertViewIs("owners.show");
    }
}
