<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentación - Sedes-Tuberculosis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/Navbar.css?v=1.0') }}" rel="stylesheet">
    <link href="{{ asset('css/documentacion.css?v=1.0') }}" rel="stylesheet">
</head>
<body>
    <div id="menu-container"></div>
    
    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <h2 class="text-center mb-4">Sistema de Referencias y Contrarreferencias</h2>
            </div>
        </div>

        <div class="form-container">
            <form id="referralForm">
                <!-- Selección de Paciente -->
                <div class="mb-4">
                    <label for="patient" class="form-label">Seleccionar Paciente</label>
                    <select class="form-select" id="patient" required>
                        <option value="">Seleccione un paciente...</option>
                        <option value="1">Juan Pérez - CI: 1234567</option>
                        <option value="2">María García - CI: 7654321</option>
                        <option value="3">Carlos López - CI: 9876543</option>
                    </select>
                </div>

                <!-- Tipo de Documento -->
                <div class="mb-4">
                    <label class="form-label">Tipo de Documento</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="documentType" id="referencia" value="referencia" checked>
                        <label class="form-check-label" for="referencia">
                            Referencia
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="documentType" id="contrarreferencia" value="contrarreferencia">
                        <label class="form-check-label" for="contrarreferencia">
                            Contrarreferencia
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="documentType" id="transferencia" value="transferencia">
                        <label class="form-check-label" for="transferencia">
                            Transferencia
                        </label>
                    </div>
                </div>

                <!-- Establecimiento de Salud -->
                <div class="mb-4">
                    <label for="healthCenter" class="form-label">Establecimiento de Salud Destino</label>
                    <select class="form-select" id="healthCenter" required>
                        <option value="">Seleccione un establecimiento...</option>
                        <option value="1">Hospital General San Juan de Dios</option>
                        <option value="2">Hospital de la Mujer</option>
                        <option value="3">Hospital del Norte</option>
                        <option value="4">Hospital del Sur</option>
                    </select>
                </div>

                <!-- Subir Documento -->
                <div class="mb-4">
                    <label for="documentFile" class="form-label">Documento Escaneado</label>
                    <input type="file" class="form-control" id="documentFile" accept="image/*" required>
                    <div id="selectedFileName" class="selected-file-name"></div>
                    <img id="imagePreview" class="preview-image" alt="Vista previa del documento">
                </div>

                <button type="submit" class="btn btn-primary">Enviar Documento</button>
            </form>
        </div>
    </div>

    <div id="footer-container"></div>
    <script src="{{ asset('js/Navbar.js') }}"></script>
    <script src="{{ asset('js/Foter.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Previsualización de la imagen
        document.getElementById('documentFile').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('imagePreview');
            const fileName = document.getElementById('selectedFileName');

            if (file) {
                fileName.textContent = file.name;
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                
                reader.readAsDataURL(file);
            }
        });

        // Manejo del formulario
        document.getElementById('referralForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const patient = document.getElementById('patient').value;
            const documentType = document.querySelector('input[name="documentType"]:checked').value;
            const healthCenter = document.getElementById('healthCenter').value;
            
            alert('Documento enviado exitosamente!\n\nPaciente: ' + 
                  document.getElementById('patient').options[document.getElementById('patient').selectedIndex].text +
                  '\nTipo de Documento: ' + documentType +
                  '\nEstablecimiento: ' + 
                  document.getElementById('healthCenter').options[document.getElementById('healthCenter').selectedIndex].text);
        });
    </script>
</body>
</html>
