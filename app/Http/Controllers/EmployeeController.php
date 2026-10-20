<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::with('department')
            ->orderBy('name')
            ->get();

        return view('employees.index', compact('employees'));
    }

    public function create(): View
    {
        $departments = Department::orderBy('name')->get();

        return view('employees.create', compact('departments'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'department_id' => [
                'required',
                'exists:departments,id',
            ],
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'numeric', 'gt:0'],
            'joined_at' => ['required', 'date'],
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function edit(Employee $employee): View
    {
        $departments = Department::orderBy('name')->get();

        return view(
            'employees.edit',
            compact('employee', 'departments')
        );
    }

    public function update(
        Request $request,
        Employee $employee
    ): RedirectResponse {
        $validated = $request->validate([
            'department_id' => [
                'required',
                'exists:departments,id',
            ],
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'numeric', 'gt:0'],
            'joined_at' => ['required', 'date'],
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Data pegawai berhasil dihapus.');
    }
}