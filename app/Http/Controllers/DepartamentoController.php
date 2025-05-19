<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos = \App\Models\Departamento::paginate(10);
        return view('departamentos.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'empleados.*.nombre' => 'nullable|string|max:255',
            'empleados.*.email' => 'nullable|email|max:255',
            'empleados.*.dni' => 'nullable|string|max:20',
        ]);
        $departamento = \App\Models\Departamento::create([
            'nombre' => $validated['nombre'],
            'ubicacion' => $validated['ubicacion'],
        ]);
        if ($request->has('empleados')) {
            foreach ($request->empleados as $empleado) {
                if (!empty($empleado['nombre']) && !empty($empleado['email']) && !empty($empleado['dni'])) {
                    $departamento->empleados()->create([
                        'nombre' => $empleado['nombre'],
                        'email' => $empleado['email'],
                        'dni' => $empleado['dni'],
                    ]);
                }
            }
        }
        return redirect()->route('departamentos.index')->with('success', 'Departamento y empleados creados correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $departamento = \App\Models\Departamento::findOrFail($id);
        return view('departamentos.show', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $departamento = \App\Models\Departamento::findOrFail($id);
        return view('departamentos.edit', compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);
        $departamento = \App\Models\Departamento::findOrFail($id);
        $departamento->update($validated);
        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $departamento = \App\Models\Departamento::findOrFail($id);
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado correctamente.');
    }
}
