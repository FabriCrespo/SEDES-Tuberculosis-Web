// Datos de ejemplo (simulando una base de datos local)
let patients = [
    {
        id: 1,
        fullName: 'Juan Pérez',
        ci: '12345678',
        establishment: 'Hospital Central',
        phase: 'Primera Fase',
        status: 'Activo',
        birthDate: '1990-05-15',
        gender: 'Masculino',
        phone: '555-1234',
        address: 'Calle Principal 123',
        photoUrl: '/img/default-avatar.png'
    },
    {
        id: 2,
        fullName: 'María García',
        ci: '87654321',
        establishment: 'Clínica Sur',
        phase: 'Segunda Fase',
        status: 'Activo',
        birthDate: '1985-08-22',
        gender: 'Femenino',
        phone: '555-5678',
        address: 'Avenida Central 456',
        photoUrl: '/img/default-avatar.png'
    },
    {
        id: 3,
        fullName: 'Juan Pérez',
        ci: '1234567',
        establishment: 'Hospital General San Juan de Dios',
        phase: 'Primera Fase',
        status: 'Activo',
        birthDate: '1975-01-01',
        gender: 'Masculino',
        phone: '71234567',
        address: 'Calle Los Pinos #123',
        photoUrl: '/img/logoMedico.png',
        endDate: '2025-06-15'
    },
    {
        id: 4,
        fullName: 'María García',
        ci: '7654321',
        establishment: 'Hospital de la Mujer',
        phase: 'Segunda Fase',
        status: 'Activo',
        birthDate: '1988-01-01',
        gender: 'Femenino',
        phone: '72345678',
        address: 'Av. Las Flores #456',
        photoUrl: '/img/logoMedico.png',
        endDate: '2025-05-20'
    },
    {
        id: 5,
        fullName: 'Carlos López',
        ci: '9876543',
        establishment: 'Hospital del Norte',
        phase: 'Primera Fase',
        status: 'En Observación',
        birthDate: '1992-01-01',
        gender: 'Masculino',
        phone: '73456789',
        address: 'Av. Principal #789',
        photoUrl: '/img/logoMedico.png',
        endDate: '2025-07-30'
    }
];

let medicalHistory = {
    1: [
        {
            date: '2024-01-15',
            doctor: 'Dr. Rodríguez',
            observations: 'Paciente muestra mejoría significativa.'
        }
    ],
    2: [
        {
            date: '2024-01-10',
            doctor: 'Dra. Sánchez',
            observations: 'Inicio de tratamiento segunda fase.'
        }
    ]
};

let currentPatient = null;

// Función para cargar los pacientes
function loadPatients() {
    try {
        // Recuperar datos del localStorage si existen
        const storedPatients = localStorage.getItem('patients');
        if (storedPatients) {
            patients = JSON.parse(storedPatients);
        }
        renderPatients();
    } catch (error) {
        console.error('Error al cargar pacientes:', error);
        showAlert('Error al cargar los pacientes', 'error');
    }
}

// Función para renderizar la tabla de pacientes
function renderPatients() {
    const tbody = document.getElementById('patientsTableBody');
    tbody.innerHTML = '';

    patients.forEach(patient => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td data-label="Nombres y Apellidos">${patient.fullName}</td>
            <td data-label="CI">${patient.ci}</td>
            <td data-label="Establecimiento">${patient.establishment}</td>
            <td data-label="Fase">
                <span class="badge ${getPhaseClass(patient.phase)}">${patient.phase}</span>
            </td>
            <td data-label="Estado">
                <span class="badge ${getStatusClass(patient.status)}">${patient.status}</span>
            </td>
            <td>
                <button class="btn-action" onclick="showPatientDetails(${patient.id})" title="Ver detalles">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="btn-action" onclick="editPatient(${patient.id})" title="Editar">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn-action text-danger" onclick="deletePatient(${patient.id})" title="Eliminar">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

// Función para mostrar los detalles del paciente
function showPatientDetails(patientId) {
    try {
        currentPatient = patients.find(p => p.id === patientId);
        if (!currentPatient) throw new Error('Paciente no encontrado');
        
        // Actualizar la información en el modal
        document.getElementById('patientPhoto').src = currentPatient.photoUrl || '/img/default-avatar.png';
        document.getElementById('phase').value = currentPatient.phase;
        document.getElementById('endDate').value = currentPatient.endDate || '';
        
        const patientInfo = document.getElementById('patientInfo');
        patientInfo.innerHTML = `
            <div class="col-md-6">
                <p class="mb-1 text-muted small">Nombre Completo</p>
                <p class="mb-3">${currentPatient.fullName}</p>
            </div>
            <div class="col-md-6">
                <p class="mb-1 text-muted small">CI</p>
                <p class="mb-3">${currentPatient.ci}</p>
            </div>
            <div class="col-md-6">
                <p class="mb-1 text-muted small">Fecha de Nacimiento</p>
                <p class="mb-3">${formatDate(currentPatient.birthDate)}</p>
            </div>
            <div class="col-md-6">
                <p class="mb-1 text-muted small">Género</p>
                <p class="mb-3">${currentPatient.gender}</p>
            </div>
            <div class="col-md-6">
                <p class="mb-1 text-muted small">Teléfono</p>
                <p class="mb-3">${currentPatient.phone}</p>
            </div>
            <div class="col-md-6">
                <p class="mb-1 text-muted small">Dirección</p>
                <p class="mb-3">${currentPatient.address}</p>
            </div>
            <div class="col-12">
                <p class="mb-1 text-muted small">Establecimiento</p>
                <p class="mb-3">${currentPatient.establishment}</p>
            </div>
        `;
        
        // Mostrar el modal
        const modal = new bootstrap.Modal(document.getElementById('patientModal'));
        modal.show();
    } catch (error) {
        console.error('Error al cargar detalles del paciente:', error);
        showAlert('Error al cargar los detalles del paciente', 'error');
    }
}

// Función para mostrar el historial médico
function showMedicalHistory() {
    if (!currentPatient) return;
    
    try {
        const history = medicalHistory[currentPatient.id] || [];
        
        const entriesContainer = document.getElementById('historyEntries');
        entriesContainer.innerHTML = '';
        
        history.forEach(entry => {
            const entryElement = document.createElement('div');
            entryElement.className = 'card mb-3';
            entryElement.innerHTML = `
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="card-subtitle text-muted">${formatDate(entry.date)}</h6>
                        <span class="badge bg-primary">Dr. ${entry.doctor}</span>
                    </div>
                    <p class="card-text">${entry.observations}</p>
                </div>
            `;
            entriesContainer.appendChild(entryElement);
        });
        
        // Mostrar el modal de historial
        const modal = new bootstrap.Modal(document.getElementById('historyModal'));
        modal.show();
    } catch (error) {
        console.error('Error al cargar historial médico:', error);
        showAlert('Error al cargar el historial médico', 'error');
    }
}

// Función para agregar una nueva entrada al historial
function addHistoryEntry(event) {
    event.preventDefault();
    
    if (!currentPatient) return;
    
    const date = document.getElementById('historyDate').value;
    const doctor = document.getElementById('historyDoctor').value;
    const observations = document.getElementById('historyObservations').value;
    
    if (!date || !doctor || !observations) {
        showAlert('Por favor complete todos los campos', 'warning');
        return;
    }
    
    try {
        if (!medicalHistory[currentPatient.id]) {
            medicalHistory[currentPatient.id] = [];
        }
        
        medicalHistory[currentPatient.id].unshift({
            date,
            doctor,
            observations
        });
        
        // Guardar en localStorage
        localStorage.setItem('medicalHistory', JSON.stringify(medicalHistory));
        
        showAlert('Entrada agregada exitosamente', 'success');
        document.getElementById('medicalHistoryForm').reset();
        showMedicalHistory(); // Recargar el historial
    } catch (error) {
        console.error('Error al agregar entrada al historial:', error);
        showAlert('Error al agregar la entrada', 'error');
    }
}

// Función para eliminar un paciente
function deletePatient(patientId) {
    if (!confirm('¿Está seguro de que desea eliminar este paciente?')) return;
    
    try {
        patients = patients.filter(p => p.id !== patientId);
        // Guardar en localStorage
        localStorage.setItem('patients', JSON.stringify(patients));
        showAlert('Paciente eliminado exitosamente', 'success');
        loadPatients(); // Recargar la lista
    } catch (error) {
        console.error('Error al eliminar paciente:', error);
        showAlert('Error al eliminar el paciente', 'error');
    }
}

// Función para editar un paciente
function editPatient(patientId) {
    window.location.href = `/registro-paciente?id=${patientId}`;
}

// Función para filtrar pacientes
function filterPatients(query) {
    const normalizedQuery = query.toLowerCase();
    const filteredPatients = patients.filter(patient => 
        patient.fullName.toLowerCase().includes(normalizedQuery) ||
        patient.ci.toLowerCase().includes(normalizedQuery)
    );
    renderFilteredPatients(filteredPatients);
}

// Función para renderizar pacientes filtrados
function renderFilteredPatients(filteredPatients) {
    const tbody = document.getElementById('patientsTableBody');
    tbody.innerHTML = '';
    
    if (filteredPatients.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="6" class="text-center py-4">
                    <i class="fas fa-search fa-2x mb-3 text-muted"></i>
                    <p class="text-muted">No se encontraron pacientes que coincidan con la búsqueda</p>
                </td>
            </tr>
        `;
        return;
    }
    
    filteredPatients.forEach(patient => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td data-label="Nombres y Apellidos">${patient.fullName}</td>
            <td data-label="CI">${patient.ci}</td>
            <td data-label="Establecimiento">${patient.establishment}</td>
            <td data-label="Fase">
                <span class="badge ${getPhaseClass(patient.phase)}">${patient.phase}</span>
            </td>
            <td data-label="Estado">
                <span class="badge ${getStatusClass(patient.status)}">${patient.status}</span>
            </td>
            <td>
                <button class="btn-action" onclick="showPatientDetails(${patient.id})" title="Ver detalles">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="btn-action" onclick="editPatient(${patient.id})" title="Editar">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn-action text-danger" onclick="deletePatient(${patient.id})" title="Eliminar">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

// Funciones auxiliares
function getPhaseClass(phase) {
    switch (phase) {
        case 'Primera Fase':
            return 'bg-primary';
        case 'Segunda Fase':
            return 'bg-success';
        default:
            return 'bg-secondary';
    }
}

function getStatusClass(status) {
    switch (status) {
        case 'Activo':
            return 'bg-success';
        case 'Inactivo':
            return 'bg-danger';
        case 'En Observación':
            return 'bg-warning';
        default:
            return 'bg-secondary';
    }
}

function formatDate(dateString) {
    if (!dateString) return 'No especificada';
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('es-ES', options);
}

function showAlert(message, type) {
    // Por ahora usamos alert básico, pero podríamos mejorar esto con una librería de notificaciones
    alert(message);
}

// Event Listeners
document.addEventListener('DOMContentLoaded', () => {
    // Cargar datos del localStorage si existen
    const storedHistory = localStorage.getItem('medicalHistory');
    if (storedHistory) {
        medicalHistory = JSON.parse(storedHistory);
    }
    
    loadPatients();
    
    // Búsqueda en tiempo real
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', (e) => filterPatients(e.target.value));
    
    // Formulario de historial médico
    const historyForm = document.getElementById('medicalHistoryForm');
    historyForm.addEventListener('submit', addHistoryEntry);
    
    // Actualización de fase y fecha
    const phaseSelect = document.getElementById('phase');
    const endDateInput = document.getElementById('endDate');
    
    phaseSelect.addEventListener('change', () => {
        if (!currentPatient) return;
        currentPatient.phase = phaseSelect.value;
        localStorage.setItem('patients', JSON.stringify(patients));
        showAlert('Fase actualizada exitosamente', 'success');
        loadPatients();
    });
    
    endDateInput.addEventListener('change', () => {
        if (!currentPatient) return;
        currentPatient.endDate = endDateInput.value;
        localStorage.setItem('patients', JSON.stringify(patients));
        showAlert('Fecha actualizada exitosamente', 'success');
    });
});
