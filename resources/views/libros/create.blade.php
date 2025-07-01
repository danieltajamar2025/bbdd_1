{{-- resources/views/libros/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear libro</h1>

    <form action="{{ route('libros.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}">
            @error('titulo') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" value="{{ old('autor') }}">
            @error('autor') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="anio_publicacion" class="form-label">Año de publicación</label>
            <input type="number" name="anio_publicacion" id="anio_publicacion" class="form-control" value="{{ old('anio_publicacion') }}">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
