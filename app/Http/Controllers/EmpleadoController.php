<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = \App\Models\Empleado::with('departamento')->paginate(10);
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = \App\Models\Departamento::all();
        return view('empleados.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'dni' => 'required|string|max:20',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);
        \App\Models\Empleado::create($validated);
        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empleado = \App\Models\Empleado::with('departamento')->findOrFail($id);
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado = \App\Models\Empleado::findOrFail($id);
        $departamentos = \App\Models\Departamento::all();
        return view('empleados.edit', compact('empleado', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'dni' => 'required|string|max:20',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);
        $empleado = \App\Models\Empleado::findOrFail($id);
        $empleado->update($validated);
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = \App\Models\Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
