<?php

namespace Tests\Feature;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_employees()
    {
        $response = $this->get('/api/employees');

        $response->assertStatus(200);
    }

    public function testsEmployeesCreate()
    {
        $headers = ['Accept' => "application/json"];

        $payload = [
            'name'         => 'John',
            'position'     => 'Head',
        ];

        $this->json('POST', '/api/employees', $payload, $headers)
            ->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('id', 1)
                    ->where('name', 'John')
                    ->where('position', 'Head')
                    ->etc()
            );
    }

    public function testsEmployeesUpdate()
    {
        $headers = ['Accept' => "application/json"];
        $employee = Employee::factory()->create([
            'name' => 'John',
        ]);

        $payload = [
            'position' => 'Center',
        ];

        $response = $this->json('PUT', '/api/employees/' . $employee->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('id', 1)
                    ->where('name', 'John')
                    ->where('position', 'Center')
                    ->etc()
            );
    }

    public function testsEmployeesDelete()
    {
        $headers = ['Accept' => "application/json"];
        $employee = Employee::factory()->create([
            'name' => 'Abigail Otwell',
        ]);

        $this->json('DELETE', '/api/employees/' . $employee->id, [], $headers)
            ->assertStatus(204);
    }

    public function testEmployeesListed()
    {
        Employee::factory()->create([
            'name' => 'Abigail Otwell',
            'position' => 'Up',
        ]);
        Employee::factory()->create([
            'name' => 'John',
            'position' => 'Trough',
        ]);

        $headers = ['Accept' => "application/json"];

        $response = $this->json('GET', '/api/employees', [], $headers)
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->has(2)
                    ->first(fn ($json) =>
                    $json->where('id', 1)
                        ->where('name', 'Abigail Otwell')
                        ->where('position', 'Up')
                        ->etc()
                    )
            )
            ->assertJsonStructure([
                '*' => ['id', 'superior_id', 'name', 'position', 'startDate', 'endDate'],
            ]);
    }


}
