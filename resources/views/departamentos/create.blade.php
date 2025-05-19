<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Departamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Crear Departamento</h1>
        <form action="{{ route('departamentos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
                @error('nombre')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación:</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
                @error('ubicacion')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="empleados" class="form-label">Empleados (opcional):</label>
                <div id="empleados-container">
                    <div class="row mb-2">
                        <div class="col">
                            <input type="text" name="empleados[0][nombre]" class="form-control" placeholder="Nombre del empleado">
                        </div>
                        <div class="col">
                            <input type="email" name="empleados[0][email]" class="form-control" placeholder="Email del empleado">
                        </div>
                        <div class="col">
                            <input type="text" name="empleados[0][dni]" class="form-control" placeholder="DNI del empleado">
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-danger remove-empleado">Eliminar</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" id="add-empleado">Agregar Empleado</button>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let empleadoIndex = 1;
        document.getElementById('add-empleado').addEventListener('click', function() {
            const container = document.getElementById('empleados-container');
            const row = document.createElement('div');
            row.className = 'row mb-2';
            row.innerHTML = `
                <div class="col">
                    <input type="text" name="empleados[${empleadoIndex}][nombre]" class="form-control" placeholder="Nombre del empleado">
                </div>
                <div class="col">
                    <input type="email" name="empleados[${empleadoIndex}][email]" class="form-control" placeholder="Email del empleado">
                </div>
                <div class="col">
                    <input type="text" name="empleados[${empleadoIndex}][dni]" class="form-control" placeholder="DNI del empleado">
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger remove-empleado">Eliminar</button>
                </div>
            `;
            container.appendChild(row);
            empleadoIndex++;
        });
        document.getElementById('empleados-container').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-empleado')) {
                e.target.closest('.row').remove();
            }
        });
    });
    </script>
</body>
</html>

