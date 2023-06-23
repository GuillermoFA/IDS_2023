<?php


namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Concert;
use Carbon\Carbon;
use App\Models\User;
class ConcertControllerTest extends TestCase
{
    public function testSuccessCreate(): void
    {

        $user = User::factory()->create();
        $user->role == 2;
        $concert = [
            'name' => 'concierto test',
            'price' => 20000,
            'stock' => 200,
            'date' => Carbon::now()->addDays(7)->format('Y-m-d')
        ];

        $response = $this->actingAs($user) // Autenticar al usuario
        ->post('/concert', $concert);
        $this->assertDatabaseHas('concerts', $concert);
        $user->delete();
       // User::where('id', 7)->delete();
         Concert::where('name', 'concierto test')->delete();
    }

    protected function tearDown(): void
    {
    // Realizar cualquier limpieza adicional aquí

    parent::tearDown();
    }



}
