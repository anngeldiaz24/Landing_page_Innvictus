<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProyectoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_contacto()
    {
        //Verifica el estado que nos dice que la petición que 
        //acabamos de hacer hacia la ruta ha sido entendida, enviada y recibida.
        $response = $this->get('/contacto');

        $response->assertStatus(200);
    }

    public function test_elementos_contacto()
    {
        
        $response = $this->get('/contacto');
        $response->assertStatus(200);
        //Verifica que los elementos de este array se encuentren en la vista seleccionada
        $response->assertSeeText(['Nombre', 'Correo electrónico', 
        'Teléfono', 'Comentarios']);

    }

    //@test lo utilizamos para referir que esta función tambien se testeará
    /** @test */
    public function validacion_formulario()
    {
        //Valida la información de los campos del formulario mandandolos
        //de forma incorrecta
        $response = $this->post('/recibe-form-contacto', [
            'name' => 'T',
            'email' => 'angeltest.com',
            'telefono' => '33000',
            'message' =>'',

        ]);

        //Verifica la existencia de las variables y verifica su contenido
        $response->assertSessionHasErrors([
            'name',
            'email',
            'telefono',
            'message',

        ]);

    }

    /** @test */
    public function prellenado_formulario_contacto()
    {
        //Valida que la peticion hacia la ruta con parámetros sea atendida y respondida
        $response = $this->get('/contacto/1234');

        $response->assertStatus(200);
        
        //Se valida que una variable sea igual a la que se envia del response
        $this->assertEquals('Angel Díaz', $response['nombre']);

    }
}
