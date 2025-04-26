@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Lista de Tareas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tareas.create') }}" class="btn btn-success mb-3">Agregar Nueva Tarea</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Status</th>
                <th>Fecha de Cumplimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->id }}</td>
                    <td>{{ $tarea->titulo }}</td>
                    <td>{{ $tarea->descripcion }}</td>
                    <td>{{ $tarea->status ? 'Completada' : 'Pendiente' }}</td>
                    <td>{{ $tarea->fecha_cumplimiento }}</td>
                    <td>
                        <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection