<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MensajesControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_muestra_listado_mensajes(): void
    {
        // $response = $this->get(route('mensajes.index'));
        $response = $this->get('/mensajes');
        $response->assertSee('Listado de Mensajes');

        $response->assertStatus(200);
    }

    /** @test */
    public function muestra_formulario_crear_mensaje(): void
    {
        $response = $this->get('/mensajes/create');
        $response->assertSee('Crear Mensaje')
            ->assertSeeHtml('name="nombre"', false);

        $response->assertStatus(200);
    }

    /** @test */
    public function crear_nuevo_mensaje(): void
    {
        $response = $this->post('/mensajes', [
            'nombre' => 'Luis',
            'correo' => 'correo@algo.com',
            'mensaje' => 'Mensaje de prueba',
        ]);

        $this->assertDatabaseHas('mensajes', [
            'nombre' => 'Luis',
            'correo' => 'correo@algo.com',
            'mensaje' => 'Mensaje de prueba',
        ]);

        //$response->assertStatus(302);
        $response->assertRedirect('/mensajes');

    }
}
