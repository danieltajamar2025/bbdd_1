{{-- resources/views/libros/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de libros</h1>

    <a href="{{ route('libros.create') }}" class="btn btn-primary mb-3">Nuevo libro</a>

    @if($libros->isEmpty())
        <p>No hay libros.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año</th>
                    <th>Disponible</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($libros as $libro)
                <tr>
                    <td>{{ $libro->id }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->anio_publicacion }}</td>
                    <td>{{ $libro->disponible ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('libros.show', $libro) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('libros.edit', $libro) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('libros.destroy', $libro) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro?')">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
