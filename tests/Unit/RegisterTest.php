<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class RegisterTest extends TestCase
{
    //1 Test para comprobar que todos los datos ingresados son incorrectos
    public function testFailedRegister()
    {
        $userData = [
            'name' => 'a',
            'email' => 'asd',
            'password' => '1'
        ];
        //Registro con campos invalidos
        $response = $this->post('/register', $userData);
        $response->assertSessionHasErrors([
            'name',
            'email',
            'password'
        ]);
    }

    //2 Test para verificar que el registro fue correcto
    public function testSucessfullRegister()
    {
        $userData = [
            'name' => 'Guillermo',
            'email' => 'guillermofuentes24@gmail.com',
            'password' => 'guille12345'
        ];
        //Registro con campos validos
        $response = $this->post('/register', $userData);
        $response->assertRedirect('dashboard');
        $this->assertAuthenticatedAs($userData);
    }


    /*.

        //3 Test en caso de que solamente 1 campo sea el incorrecto
    public function testCampFail()
    {
        $userData = [
            'name' => 'w',
            'email' => 'hola',
            'password' => 'hola1234'
        ];
        //Registro
        $response = $this->post('/register', $userData);
        $response->assertSessionHasErrors([
            'email'
        ]);
    }


    //4  Todos los campos null
    public function testNullRegister()
    {
        $userData = [
            'name' => '',
            'email' => '',
            'password' => ''
        ];
        //Registro con campos invalidos
        $response = $this->post('/register', $userData);
        $response->assertNull($userData);
    }

    //5 Contraseña alfanumerica
    public function testPasswordRegister()
    {
        $userData = [
            'name' => 'Italo',
            'email' => 'italo@ucn.cl',
            'password' => 'wp'
        ];
        //Registro con campos invalidos
        $response = $this->post('/register', $userData);
        $response->assertSessionHasErrors([
            'password'
        ]);
    }

    public function testIsAdmin()
    {
        $userData = [
            'name' => 'Italo',
            'email' => 'italo@ucn.cl',
            'password' => 'donoso1234',
            'role' => 2
        ];
        //Registro con campos invalidos
        $response = $this->post('/register', $userData);
        $response->assertEquals($this->userData()->role() == 2);
    }



    .*/
}

