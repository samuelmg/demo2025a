<?php

namespace Tests\Feature;

use App\Models\Mensaje;
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
        //Dado
        $mensaje = Mensaje::factory()->make();

        //Acción
        $response = $this->post('/mensajes', $mensaje->toArray());
        
        //Expectativa
        $this->assertDatabaseHas('mensajes', $mensaje->toArray());
        //$response->assertStatus(302);
        $response->assertRedirect('/mensajes');
    }

    /** @test */
    public function muestra_formulario_editar_mensaje(): void
    {
        //Dado
        $mensaje = Mensaje::factory()->create();

        //Acción
        // $response = $this->get("/mensajes/{$mensaje->id}/edit");
        $response = $this->get(route('mensajes.edit', $mensaje->id));

        //Expectativa
        $response->assertSee('Editar mensaje')
            ->assertSeeHtml($mensaje->nombre)
            ->assertSeeHtml($mensaje->correo)
            ->assertSeeHtml($mensaje->mensaje)
            ->assertStatus(200);
    }
}
