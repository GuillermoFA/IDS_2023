<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{

    public function testSuccessLogin(): void
    {
        //Se crea un usuario en la base de datos
        $user = User::create([
             'name' => 'Ignacio',
             'email' => 'ignacio6@gmail.com',
             'role' => '1',
             'password' => Hash::make('1234567a')
         ]);

        //Se intenta acceder con las credenciales del usuario antes creado
        $response = $this->post('/login', [
            'email' => 'ignacio6@gmail.com',
            'password' => '1234567a'
        ]);

        $response->assertStatus(302);           //Verifica que se haya realizado una redirección.
        $response->assertRedirect('dashboard'); //Verifica que la redirección haya sido a la vista "dashboad.
        $this->assertAuthenticatedAs($user);    //Comprueba que exista un usuario autenticado.
    }
}


