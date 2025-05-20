<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Departamentos</h1>
        <a href="{{ route('departamentos.create') }}" class="btn btn-primary mb-3">Crear Departamento</a>
        <a href="{{ route('empleados.create') }}" class="btn btn-success mb-3 ms-2">Crear Empleado</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($departamentos->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departamentos as $departamento)
                        <tr>
                            <td>{{ $departamento->id }}</td>
                            <td>{{ $departamento->nombre }}</td>
                            <td>{{ $departamento->ubicacion }}</td>
                            <td>
                                <a href="{{ route('departamentos.show', $departamento) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('departamentos.edit', $departamento) }}" class="btn btn-warning btn-sm">Editar</a>
                                <a href="{{ route('departamentos.show', $departamento) }}#empleados" class="btn btn-secondary btn-sm">Ver Empleados</a>
                                <form action="{{ route('departamentos.destroy', $departamento) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este departamento?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $departamentos->links() }}
        @else
            <p>No hay departamentos registrados.</p>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

