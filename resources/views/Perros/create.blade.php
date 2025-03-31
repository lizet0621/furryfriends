@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">Registrar Perro</h1>
        </div>
        <div class="card-body">
            <form id="formPerros" action="{{ route('Perros.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <!-- Campo Nombre -->
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre *</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                        <div class="invalid-feedback" id="nombre-error"></div>
                    </div>

                    <!-- Campo Edad -->
                    <div class="col-md-6">
                        <label for="edad" class="form-label">Edad (años) *</label>
                        <input type="number" class="form-control" id="edad" name="edad" min="0" max="30" required>
                        <div class="invalid-feedback" id="edad-error"></div>
                    </div>

                    <!-- Campo Raza -->
                    <div class="col-md-6">
                        <label for="raza" class="form-label">Raza</label>
                        <input type="text" class="form-control" id="raza" name="raza">
                    </div>

                    <!-- Campo Tamaño -->
                    <div class="col-md-6">
                        <label for="tamanio" class="form-label">Tamaño *</label>
                        <select class="form-select" id="tamanio" name="tamanio" required>
                            <option value="" selected disabled>Seleccione...</option>
                            <option value="Pequeño">Pequeño</option>
                            <option value="Mediano">Mediano</option>
                            <option value="Grande">Grande</option>
                        </select>
                        <div class="invalid-feedback" id="tamanio-error"></div>
                    </div>

                    <!-- Campo Descripción -->
                    <div class="col-12">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                    </div>

                    <!-- Campo Refugio -->
                    <div class="col-md-6">
                        <label for="refugio" class="form-label">Refugio *</label>
                        <input type="text" class="form-control" id="refugio" name="refugio" required>
                        <div class="invalid-feedback" id="refugio-error"></div>
                    </div>

                    <!-- Campo Disponible -->
                    <div class="col-md-6">
                        <div class="form-check form-switch mt-4 pt-2">
                            <input class="form-check-input" type="checkbox" id="disponible" name="disponible" checked value="1">
                            <label class="form-check-label" for="disponible">Disponible para adopción</label>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-save me-2"></i> Registrar
                        </button>
                        <a href="{{ route('Perros.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i> Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formPerros');
    const submitBtn = document.getElementById('submitBtn');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Procesando...';

        try {
            const formData = new FormData(form);
            const response = await fetch("{{ route('Perros.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                // Limpiar errores anteriores
                document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

                // Mostrar nuevos errores
                if (data.errors) {
                    Object.entries(data.errors).forEach(([field, messages]) => {
                        const input = document.querySelector([name="${field}"]);
                        const errorElement = document.getElementById(${field}-error);
                        if (input && errorElement) {
                            input.classList.add('is-invalid');
                            errorElement.textContent = messages[0];
                        }
                    });
                }
                throw new Error(data.message || 'Error en la validación');
            }

            // Éxito: mostrar mensaje y redirigir
            Swal.fire({
                icon: 'success',
                title: '¡Registro exitoso!',
                text: 'El Perros ha sido registrado correctamente',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = "{{ route('Perros.index') }}";
            });

        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: error.message || 'Ocurrió un error al registrar el Perros',
                confirmButtonText: 'Entendido'
            });
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-save me-2"></i> Registrar';
        }
    });
});
</script>
@endsection