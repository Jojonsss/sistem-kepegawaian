<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    public function index(): View
    {
        $departments = Department::withCount('employees')
            ->orderBy('name')
            ->get();

        return view('departments.index', compact('departments'));
    }

    public function create(): View
    {
        return view('departments.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:departments,name'],
        ]);

        Department::create($validated);

        return redirect()->route('departments.index')
            ->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function edit(Department $department): View
    {
        return view('departments.edit', compact('department'));
    }

    public function update(
        Request $request,
        Department $department
    ): RedirectResponse {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:departments,name,' . $department->id,
            ],
        ]);

        $department->update($validated);

        return redirect()->route('departments.index')
            ->with('success', 'Departemen berhasil diperbarui.');
    }

    public function destroy(Department $department): RedirectResponse
    {
        if ($department->employees()->exists()) {
            return redirect()->route('departments.index')
                ->with(
                    'error',
                    'Departemen tidak bisa dihapus karena masih memiliki pegawai.'
                );
        }

        $department->delete();

        return redirect()->route('departments.index')
            ->with('success', 'Departemen berhasil dihapus.');
    }
}