<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Concert;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BuyTicketTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }


    /**
     * A basic test example.
     */
    public function viewTest(): void
    {
        $user = User::create([
            'name' => 'Nicolas',
            'email' => 'ejemplo@gmail.com',
            'role' => 1,
            'password' => bcrypt('ejemplo123')
        ]);

        $response = $this->get('/concert-order/{id}', [
            'email' => 'ejemplo@gmail.com',
            'password' => 'ejemplo123',
        ]);

        // $this->assertTrue(true);
    }


}
