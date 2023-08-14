<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FrutaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListAllFruits()
    {
        $estructura = [
            "*" => [
            "id",
            "nombre",
            "tipo",
            "gramos",
            "precio",
            "created_at",
            "deleted_at",
            "updated_at"
            ]
        ];

        $response = $this->get('/api/v1/fruta');

        $response->assertStatus(200);
        $response->assertJsonCount(503);
        $response->assertJsonStructure($estructura); // Valida que la estructura de JSON tenga los campos especificados en el array

    }

    public function test_ListOneFruit()
    {
        $estructura = [
            "id",
            "nombre",
            "tipo",
            "gramos",
            "precio",
            "created_at",
            "deleted_at",
            "updated_at"
        ];

        $response = $this->get('/api/v1/fruta/1001');

        $response->assertStatus(200);
        $response->assertJsonCount(8);
        $response->assertJsonStructure($estructura); // Valida que la estructura de JSON tenga los campos especificados en el array
        $response->assertJsonFragment([
            "id" => 1001,
            "nombre" => "Frula",
            "tipo" => "polvito magico",
            "precio" => 3000,
            "gramos" => 1
        ]);
    }

    public function test_CreateOneFruit()
    {
        $estructura = [
            "id",
            "nombre",
            "tipo",
            "gramos",
            "precio",
            "created_at",
            "updated_at"
        ];

        $response = $this->post('/api/v1/fruta',[
            'nombre' => "Fruta Loca",
            'tipo' => "Psicoactivo",
            'gramos' => 10,
            'precio' => 50
        ]);

        $response->assertStatus(201);
        $response->assertJsonCount(7);
        $response->assertJsonStructure($estructura); // Valida que la estructura de JSON tenga los campos especificados en el array
        $response->assertJsonFragment([
            'nombre' => "Fruta Loca",
            'tipo' => "Psicoactivo",
            'gramos' => 10,
            'precio' => 50
        ]);
        $this->assertDatabaseHas('frutas', [
            'nombre' => "Fruta Loca",
            'tipo' => "Psicoactivo",
            'gramos' => 10,
            'precio' => 50
        ]);
    }


    public function test_UpdateOneFruitThatDoesExists()
    {
        $estructura = [
            "id",
            "nombre",
            "tipo",
            "gramos",
            "precio",
            "created_at",
            "updated_at"
        ];
        $response = $this->put('/api/v1/fruta/1002',[
            'nombre' => "Sandia",
            'tipo' => "De gordo",
            'gramos' => 10000,
            'precio' => 200
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(8);
        $response->assertJsonStructure($estructura); // Valida que la estructura de JSON tenga los campos especificados en el array
        $response->assertJsonFragment([
            'nombre' => "Sandia",
            'tipo' => "De gordo",
            'gramos' => 10000,
            'precio' => 200
        ]);
        $this->assertDatabaseHas('frutas', [
            'id' => 1002,
            'nombre' => "Sandia",
            'tipo' => "De gordo",
            'gramos' => 10000,
            'precio' => 200
        ]);
    }

    public function test_UpdateOneFruitThatDoesNotExists(){
        $response = $this->put('/api/v1/fruta/30001');
        $response->assertStatus(404);
    }

    public function test_DeleteOneFruitThatDoesExists()
    {
        $estructura = [
            "message"
        ];

        $response = $this->delete('/api/v1/fruta/1001');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonStructure($estructura); // Valida que la estructura de JSON tenga los campos especificados en el array
        $response->assertJsonFragment([
             "message" => "Deleted"
        ]);
        $this->assertDatabaseMissing('frutas', [
            'id' => 1001,
            "deleted_at" => null
            
        ]);
    }

    public function test_DeleteOneFruitThatDoesNotExists(){
        $response = $this->delete('/api/v1/fruta/30000');
        $response->assertStatus(404);
    }

}
