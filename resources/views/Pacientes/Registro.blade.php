<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('css/Navbar.css?v=1.0') }}" rel="stylesheet">
    <link href="{{ asset('css/Registro.css?v=1.0') }}" rel="stylesheet">
</head>
<body>
    <div id="menu-container"></div>
    
    <div class="page-container">
        <div class="container">
            <div class="registration-header">
                <img src="/img/logotuberculosis.png" alt="Logo" class="registration-logo">
                <h1>Registro de Pacientes</h1>
                <p class="text-muted">Complete el formulario con los datos del paciente</p>
            </div>

            <div class="card registration-card">
                <div class="card-body">
                    <form id="Formb" class="registration-form">
                        <div class="form-header">
                            <h4><i class="fas fa-user-plus"></i> Registro de Paciente</h4>
                            <p>Complete los datos del paciente</p>
                        </div>

                        <div class="form-section">
                            <div class="row">
                                <!-- Columna Izquierda -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5 class="section-title"><i class="fas fa-user"></i> Datos Personales</h5>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
                                            <label for="nombres">Nombres</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Primer Apellido" required>
                                            <label for="apellido1">Primer Apellido</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido">
                                            <label for="apellido2">Segundo Apellido</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="ci" name="ci" placeholder="CI" required>
                                            <label for="ci">Carnet de Identidad</label>
                                        </div>
                                        <div class="gender-group mb-4">
                                            <label class="form-label">Género</label>
                                            <div class="btn-group" role="group">
                                                <input type="radio" class="btn-check" name="genero" id="masculino" value="masculino" required>
                                                <label class="btn btn-outline-primary" for="masculino">
                                                    <i class="fas fa-mars"></i> Masculino
                                                </label>
                                                <input type="radio" class="btn-check" name="genero" id="femenino" value="femenino" required>
                                                <label class="btn btn-outline-primary" for="femenino">
                                                    <i class="fas fa-venus"></i> Femenino
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5 class="section-title"><i class="fas fa-phone"></i> Información de Contacto</h5>
                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control" id="celular" name="celular" placeholder="Celular" required>
                                            <label for="celular">Celular</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                                            <label for="fechaNacimiento">Fecha de Nacimiento</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="direccion" name="direccion" style="height: 100px" placeholder="Dirección" required></textarea>
                                            <label for="direccion">Dirección</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Columna Derecha -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5 class="section-title"><i class="fas fa-hospital"></i> Detalles del Tratamiento</h5>
                                        <div class="establishment-group mb-3">
                                            <div class="form-floating">
                                                <select class="form-select" id="establecimiento" name="establecimiento" required>
                                                    <option value="">Seleccione establecimiento</option>
                                                    <option value="sacaba">Sacaba</option>
                                                    <option value="cercado">Cercado</option>
                                                </select>
                                                <label for="establecimiento">Establecimiento</label>
                                            </div>
                                            <button type="button" class="btn btn-primary" id="btnAddEstablishment">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="fase" name="fase" required>
                                                <option value="">Seleccione fase</option>
                                                <option value="fase1">Primera Fase</option>
                                                <option value="fase2">Segunda Fase</option>
                                            </select>
                                            <label for="fase">Fase del Tratamiento</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
                                            <label for="fechaInicio">Fecha Inicio del Tratamiento</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="fechaFin" name="fechaFin" required>
                                            <label for="fechaFin">Fecha Fin del Tratamiento</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5 class="section-title"><i class="fas fa-camera"></i> Foto del Paciente</h5>
                                        <div class="photo-upload">
                                            <div class="upload-area" id="uploadArea">
                                                <input type="file" id="foto" name="foto" accept="image/*" class="file-input">
                                                <div class="upload-content">
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                    <p>Arrastra una imagen o haz clic para seleccionar</p>
                                                </div>
                                                <img id="imagePreview" class="preview-image" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-buttons">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save"></i> Registrar Paciente
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="footer-container"></div>

    <!-- Modal de Establecimiento -->
    <div class="modal fade" id="modal-establishment" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-hospital-alt"></i> Registro de Establecimiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="establishmentForm">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nombreEstablecimiento" placeholder="Nombre" required>
                            <label for="nombreEstablecimiento"><i class="fas fa-building"></i> Nombre del Establecimiento</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="telefonoEstablecimiento" placeholder="Teléfono" required>
                            <label for="telefonoEstablecimiento"><i class="fas fa-phone"></i> Teléfono</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar Establecimiento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Éxito -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                    <div class="success-animation">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h4 class="mt-3">¡Registro Exitoso!</h4>
                    <p class="text-muted">El paciente ha sido registrado correctamente.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Navbar.js') }}"></script>
    <script src="{{ asset('js/Foter.js') }}"></script>
    <script src="{{ asset('js/Registro.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
