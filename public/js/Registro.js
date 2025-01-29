document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('Formb');
    const uploadArea = document.getElementById('uploadArea');
    const imagePreview = document.getElementById('imagePreview');
    const photoInput = document.getElementById('foto');
    const btnAddEstablishment = document.getElementById('btnAddEstablishment');

    // Manejo del formulario
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        
        if (!validateForm()) {
            showAlert('Por favor complete todos los campos requeridos', 'warning');
            return;
        }

        // Recopilar datos del formulario
        const formData = new FormData(form);
        const patientData = Object.fromEntries(formData.entries());

        // Guardar en localStorage
        try {
            const patients = JSON.parse(localStorage.getItem('patients') || '[]');
            patientData.id = Date.now();
            patients.push(patientData);
            localStorage.setItem('patients', JSON.stringify(patients));
            
            showAlert('Paciente registrado exitosamente', 'success');
            setTimeout(() => {
                window.location.href = '/pacientes';
            }, 1500);
        } catch (error) {
            console.error('Error al guardar paciente:', error);
            showAlert('Error al registrar paciente', 'error');
        }
    });

    // Manejo de la carga de fotos
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            handleFile(files[0]);
        }
    });

    photoInput.addEventListener('change', (e) => {
        const files = e.target.files;
        if (files.length > 0) {
            handleFile(files[0]);
        }
    });

    // Manejo del modal de establecimiento
    btnAddEstablishment.addEventListener('click', () => {
        new bootstrap.Modal(document.getElementById('modal-establishment')).show();
    });

    const establishmentForm = document.getElementById('establishmentForm');
    if (establishmentForm) {
        establishmentForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const formData = new FormData(e.target);
            const establishmentData = Object.fromEntries(formData.entries());

            try {
                const establishments = JSON.parse(localStorage.getItem('establishments') || '[]');
                establishmentData.id = Date.now();
                establishments.push(establishmentData);
                localStorage.setItem('establishments', JSON.stringify(establishments));
                
                updateEstablishmentSelect(establishmentData);
                
                const modal = bootstrap.Modal.getInstance(document.getElementById('modal-establishment'));
                modal.hide();
                
                showAlert('Establecimiento agregado exitosamente', 'success');
            } catch (error) {
                console.error('Error al guardar establecimiento:', error);
                showAlert('Error al agregar establecimiento', 'error');
            }
        });
    }

    // Funciones auxiliares
    function handleFile(file) {
        if (!file.type.startsWith('image/')) {
            showAlert('Por favor seleccione un archivo de imagen válido', 'warning');
            return;
        }

        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
            document.querySelector('.upload-content').style.display = 'none';
        };
        reader.readAsDataURL(file);
    }

    function updateEstablishmentSelect(newEstablishment) {
        const select = document.getElementById('establecimiento');
        const option = document.createElement('option');
        option.value = newEstablishment.id;
        option.textContent = newEstablishment.nombre;
        select.appendChild(option);
        select.value = newEstablishment.id;
    }

    function validateForm() {
        const requiredFields = form.querySelectorAll('[required]');
        return Array.from(requiredFields).every(field => field.checkValidity());
    }

    function showAlert(message, type) {
        alert(message);
    }
});