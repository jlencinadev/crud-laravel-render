<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Detalle del Empleado</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $empleado->nombre }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $empleado->email }}</p>
                <p class="card-text"><strong>DNI:</strong> {{ $empleado->dni }}</p>
                <p class="card-text"><strong>Departamento:</strong> {{ $empleado->departamento->nombre }}</p>
                <a href="{{ route('empleados.index') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

