<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoTest extends TestCase
{
    // use RefreshDatabase;

    /** @test */
    public function realizando_soma_de_dois_numeros()
    {
        $valor1 = 1;
        $valor2 = 2;

        $soma = $valor1+$valor2;

        $this->assertEquals(3, $soma);
    }

    /** @test */
    public function it_requires_a_title_to_create_a_todo()
    {
        $response = $this->postJson('/api/todo', [
            'description' => 'This is a test description',
            'done' => false,
        ]);

        $response->assertStatus(422)
                ->assertJson(['message' => 'A propriedade title e obrigatoria']);

    }

    // /** @test */
    // public function it_can_create_a_todo_with_valid_data()
    // {
    //     $response = $this->postJson('/api/todo', [
    //         'title' => 'Test Todo',
    //         'description' => 'This is a test description',
    //         'done' => false,
    //     ]);

    //     $response->assertStatus(201)
    //              ->assertJson(['message' => 'Lista criada com sucesso']);

    //     $this->assertDatabaseHas('todos', [
    //         'title' => 'Test Todo',
    //         'description' => 'This is a test description',
    //         'done' => false,
    //     ]);
    // }

    // /** @test */
    // public function it_can_update_a_todo()
    // {
    //     $todo = Todo::create([
    //         'title' => 'Initial Title',
    //         'description' => 'Initial Description',
    //         'done' => false,
    //     ]);

    //     $response = $this->putJson("/api/todo/{$todo->id}", [
    //         'title' => 'Updated Title',
    //         'description' => 'Updated Description',
    //         'done' => true,
    //     ]);

    //     $response->assertStatus(201)
    //              ->assertJson(['message' => 'Lista atualizada com sucesso']);

    //     $this->assertDatabaseHas('todos', [
    //         'id' => $todo->id,
    //         'title' => 'Updated Title',
    //         'description' => 'Updated Description',
    //         'done' => true,
    //     ]);
    // }

    // /** @test */
    // public function it_returns_404_when_updating_non_existent_todo()
    // {
    //     $response = $this->putJson('/api/todo/999', [
    //         'title' => 'Updated Title',
    //         'description' => 'Updated Description',
    //         'done' => true,
    //     ]);

    //     $response->assertStatus(404)
    //              ->assertJson(['message' => 'A lista nao foi encontrada']);
    // }
}
