<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function show(Employee $employee)
    {
        return $employee;
    }

    public function store(Request $request)
    {
        return Employee::create($request->all());
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());

        return $employee;
    }

    public function delete(Request $request, Employee $employee)
    {
        $employee->delete();

        return response()->json([
            'message' => 'Resource deleted'
        ], 204);
    }
}
