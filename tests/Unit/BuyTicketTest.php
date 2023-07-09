<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Concert;
use App\Models\User;
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

        $concert = Concert::create([
            'name' => 'Fiesta Feliz',
            'price' => 23000,
            'stock' => 150,
            'date' => date_create('2023-08-23'),
        ]);


        $response = $this->get("/concert-order/{'$concert->id'}", [
            $user
        ]);

        // $this->assertTrue(true);
    }


}
