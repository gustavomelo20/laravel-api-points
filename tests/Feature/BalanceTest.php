<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BalanceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_show_balance()
    {
        $response = $this->get('/points/48905886809');

        dd($response);

        $response->assertStatus(200);
    }
}
