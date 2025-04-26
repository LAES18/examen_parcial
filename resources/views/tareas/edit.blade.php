@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Editar Tarea</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $tarea->titulo) }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion', $tarea->descripcion) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select class="form-select" id="status" name="status" required>
                <option value="1" {{ old('status', $tarea->status) == 1 ? 'selected' : '' }}>Completada</option>
                <option value="0" {{ old('status', $tarea->status) == 0 ? 'selected' : '' }}>Pendiente</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha_cumplimiento" class="form-label">Fecha de Cumplimiento</label>
            <input type="date" class="form-control" id="fecha_cumplimiento" name="fecha_cumplimiento" value="{{ old('fecha_cumplimiento', $tarea->fecha_cumplimiento) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
    </form>
</div>
@endsection