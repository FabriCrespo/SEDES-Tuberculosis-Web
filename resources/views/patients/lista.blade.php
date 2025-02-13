@extends('layout')

@section('title', 'Lista de Pacientes')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sedes-Tuberculosis - Pacientes</title>
    
    <!-- Estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/Navbar.css?v=1.1') }}" rel="stylesheet">
    <link href="{{ asset('css/Lista-pacientes.css?v=1.1') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Menu -->
    <div id="menu-container"></div>

    <div class="container">
        <!-- Encabezado de la Página -->
        <div class="row mb-4">
            <div class="col">
                <h1 class="h3 mb-0 text-primary my-custom-title">Lista de Pacientes</h1>
                <p class="text-muted">Gestiona y monitorea los pacientes registrados</p>
            </div>
            <div class="col-auto">
                <button class="btn btn-primaryy" onclick="window.location.href='/patients/registro'">
                    <i class="fas fa-plus me-2"></i>Nuevo Paciente
                </button>
            </div>
        </div>

        <!-- Barra de búsqueda -->
        <div class="search-container">
            <div class="input-group">
                <span class="input-group-text border-0">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar paciente por nombre o CI...">
            </div>
        </div>

        <!-- Tabla de Pacientes -->
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombres y Apellidos</th>
                        <th>CI</th>
                        <th>Establecimiento</th>
                        <th>Fase</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="patientsTableBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de Detalles del Paciente -->
    <div class="modal fade" id="patientModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalles del Paciente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Foto y Estado del Tratamiento -->
                        <div class="col-md-4">
                            <div class="text-center mb-4">
                                <img id="patientPhoto" src="" alt="Foto del paciente" class="img-fluid rounded-3 mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" onclick="showMedicalHistory()">
                                        <i class="fas fa-notes-medical me-2"></i>Historial Médico
                                    </button>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title mb-3">Estado del Tratamiento</h6>
                                    <div class="mb-3">
                                        <label class="form-label">Fase Actual</label>
                                        <select id="phase" class="form-select">
                                            <option value="Primera Fase">Primera Fase</option>
                                            <option value="Segunda Fase">Segunda Fase</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Fecha Fin Tratamiento</label>
                                        <input type="date" id="endDate" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Información Personal -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title mb-3">Información Personal</h6>
                                    <div id="patientInfo" class="row g-3">
                                        <!-- La información se cargará dinámicamente -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Historial Médico -->
    <div class="modal fade" id="historyModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Historial Médico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h6 class="card-title mb-3">Nueva Entrada</h6>
                            <form id="medicalHistoryForm">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Fecha</label>
                                        <input type="date" id="historyDate" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Doctor</label>
                                        <input type="text" id="historyDoctor" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Observaciones</label>
                                        <textarea id="historyObservations" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-plus me-2"></i>Agregar Entrada
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="historyEntries">
                        <!-- Las entradas del historial se cargarán dinámicamente -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div id="footer-container"></div>

    <!-- Scripts -->
    <script src="{{ asset('js/Lista-pacientes.js') }}"></script>
</body>
</html>

@endsection
