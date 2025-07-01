{{-- resources/views/libros/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ficha del libro</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $libro->id }}</li>
        <li class="list-group-item"><strong>Título:</strong> {{ $libro->titulo }}</li>
        <li class="list-group-item"><strong>Autor:</strong> {{ $libro->autor }}</li>
        <li class="list-group-item"><strong>Año:</strong> {{ $libro->anio_publicacion }}</li>
        <li class="list-group-item"><strong>Disponible:</strong> {{ $libro->disponible ? 'Sí' : 'No' }}</li>
    </ul>

    <a href="{{ route('libros.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
</div>
@endsection
