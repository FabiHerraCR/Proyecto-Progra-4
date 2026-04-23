<?php

namespace Tests\Feature;

use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductoEdicionTest extends TestCase
{
    use RefreshDatabase;

    public function test_el_formulario_de_edicion_se_muestra_correctamente(): void
    {
        $producto = Producto::create([
            'codigo' => 'P-232',
            'nombre' => 'Perros',
            'categoria' => 'Animal',
            'precio' => 100.00,
            'stock' => 12,
        ]);

        $response = $this->get("/productos/{$producto->codigo}/editar");

        $response->assertStatus(200);
        $response->assertSee('Modificar Producto');
        $response->assertSee('P-232');
        $response->assertSee('Perros');
    }

    public function test_se_puede_actualizar_un_producto_sin_cambiar_su_codigo(): void
    {
        Producto::create([
            'codigo' => 'P-232',
            'nombre' => 'Perros',
            'categoria' => 'Animal',
            'precio' => 100.00,
            'stock' => 12,
        ]);

        $response = $this->put('/productos/P-232', [
            'codigo' => 'P-999',
            'nombre' => 'Gatos',
            'categoria' => 'Mascotas',
            'precio' => 150.50,
            'stock' => 8,
        ]);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('productos', [
            'codigo' => 'P-232',
            'nombre' => 'Gatos',
            'categoria' => 'Mascotas',
            'precio' => 150.50,
            'stock' => 8,
        ]);

        $this->assertDatabaseMissing('productos', [
            'codigo' => 'P-999',
        ]);
    }
}
