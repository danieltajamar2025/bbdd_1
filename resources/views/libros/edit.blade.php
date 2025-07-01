{{-- resources/views/libros/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar libro</h1>

    <form action="{{ route('libros.update', $libro) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $libro->titulo) }}">
            @error('titulo') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" value="{{ old('autor', $libro->autor) }}">
            @error('autor') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="anio_publicacion" class="form-label">Año de publicación</label>
            <input type="number" name="anio_publicacion" id="anio_publicacion" class="form-control" value="{{ old('anio_publicacion', $libro->anio_publicacion) }}">
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="disponible" id="disponible" value="1" {{ $libro->disponible ? 'checked' : '' }}>
            <label class="form-check-label" for="disponible">Disponible</label>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
