<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Usuario;
use App\Models\Libro;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with(['usuario', 'libro'])->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $libros = Libro::where('disponible', true)->get();
        return view('prestamos.create', compact('usuarios', 'libros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'libro_id' => 'required|exists:libros,id',
            'fecha_prestamo' => 'required|date',
        ]);

        Prestamo::create($request->all());

        // Actualizar disponibilidad del libro
        $libro = Libro::find($request->libro_id);
        $libro->disponible = false;
        $libro->save();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo creado correctamente.');
    }

    public function show(Prestamo $prestamo)
    {
        $prestamo->load(['usuario', 'libro']);
        return view('prestamos.show', compact('prestamo'));
    }

    public function edit(Prestamo $prestamo)
    {
        $usuarios = Usuario::all();
        $libros = Libro::all();
        return view('prestamos.edit', compact('prestamo', 'usuarios', 'libros'));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'libro_id' => 'required|exists:libros,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date',
        ]);

        $prestamo->update($request->all());

        // Actualizar disponibilidad del libro si fecha_devolucion está presente
        if ($request->fecha_devolucion) {
            $libro = Libro::find($request->libro_id);
            $libro->disponible = true;
            $libro->save();
        }

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado correctamente.');
    }

    public function destroy(Prestamo $prestamo)
    {
        // Antes de borrar el préstamo, actualizar disponibilidad del libro
        $libro = Libro::find($prestamo->libro_id);
        $libro->disponible = true;
        $libro->save();

        $prestamo->delete();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado correctamente.');
    }
}
