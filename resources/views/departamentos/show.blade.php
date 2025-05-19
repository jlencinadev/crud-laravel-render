<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Departamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Detalle del Departamento</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $departamento->nombre }}</h5>
                <p class="card-text"><strong>Ubicación:</strong> {{ $departamento->ubicacion }}</p>
                <a href="{{ route('departamentos.index') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>

        <div class="card mt-4" id="empleados">
            <div class="card-header">
                <h5>Empleados de este departamento</h5>
            </div>
            <div class="card-body">
                @if ($departamento->empleados && $departamento->empleados->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>DNI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departamento->empleados as $empleado)
                                <tr>
                                    <td>{{ $empleado->nombre }}</td>
                                    <td>{{ $empleado->email }}</td>
                                    <td>{{ $empleado->dni }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No hay empleados en este departamento.</p>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

