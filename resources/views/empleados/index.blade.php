<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Empleados</h1>
        <a href="{{ route('empleados.create') }}" class="btn btn-warning mb-3">Crear Empleado</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($empleados->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>DNI</th>
                        <th>Departamento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->id }}</td>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->email }}</td>
                            <td>{{ $empleado->dni }}</td>
                            <td>{{ $empleado->departamento->nombre }}</td>
                            <td>
                                <a href="{{ route('empleados.show', $empleado) }}" class="btn btn-warning btn-sm">Ver</a>
                                <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('¿Estás seguro de eliminar este empleado?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $empleados->links() }}
        @else
            <p>No hay empleados registrados.</p>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

