 const patients = [
    {
        id: 1,
        nombres: 'Juan Carlos',
        apellido1: 'García',
        apellido2: 'Martínez',
        ci: '12345678',
        celular: '71234567',
        genero: 'Masculino',
        establecimiento: 'Sacaba',
        fechaNacimiento: '1990-05-15',
        fase: 'Primera Fase',
        fechaInicio: '2024-01-01',
        fechaFin: '2024-06-01',
        foto: 'https://via.placeholder.com/150',
        direccion: 'Av. Principal #123',
        historialMedico: [
            {
                fecha: '2024-01-01',
                descripcion: 'Inicio de tratamiento',
                doctor: 'Dr. Roberto Sánchez'
            },
            {
                fecha: '2024-02-15',
                descripcion: 'Control mensual - Evolución favorable',
                doctor: 'Dra. María López'
            }
        ]
    },
    {
        id: 2,
        nombres: 'Ana María',
        apellido1: 'López',
        apellido2: 'Silva',
        ci: '87654321',
        celular: '73216547',
        genero: 'Femenino',
        establecimiento: 'Cercado',
        fechaNacimiento: '1995-08-20',
        fase: 'Segunda Fase',
        fechaInicio: '2023-11-01',
        fechaFin: '2024-04-01',
        foto: 'https://via.placeholder.com/150',
        direccion: 'Calle Secundaria #456',
        historialMedico: [
            {
                fecha: '2023-11-01',
                descripcion: 'Inicio de tratamiento',
                doctor: 'Dr. Carlos Mendoza'
            }
        ]
    }
];

let selectedPatient = null;


function loadPatients(filteredPatients = patients) {
    const tbody = document.getElementById('patientsTableBody');
    tbody.innerHTML = filteredPatients.map(patient => `
        <tr>
            <td>${patient.nombres} ${patient.apellido1} ${patient.apellido2}</td>
            <td>${patient.ci}</td>
            <td>${patient.establecimiento}</td>
            <td>${patient.fase}</td>
            <td>
                <button class="btn btn-primary btn-sm" onclick="showPatientDetails(${patient.id})">
                    Ver detalles
                </button>
            </td>
        </tr>
    `).join('');
}


function showPatientDetails(patientId) {
    selectedPatient = patients.find(p => p.id === patientId);
    document.getElementById('patientPhoto').src = selectedPatient.foto;
    document.getElementById('endDate').value = selectedPatient.fechaFin;
    document.getElementById('phase').value = selectedPatient.fase;
    
    document.getElementById('patientInfo').innerHTML = `
        <p><strong>Nombres:</strong> ${selectedPatient.nombres}</p>
        <p><strong>Apellidos:</strong> ${selectedPatient.apellido1} ${selectedPatient.apellido2}</p>
        <p><strong>CI:</strong> ${selectedPatient.ci}</p>
        <p><strong>Celular:</strong> ${selectedPatient.celular}</p>
        <p><strong>Género:</strong> ${selectedPatient.genero}</p>
        <p><strong>Establecimiento:</strong> ${selectedPatient.establecimiento}</p>
        <p><strong>Fecha Nacimiento:</strong> ${selectedPatient.fechaNacimiento}</p>
        <p><strong>Fecha Inicio:</strong> ${selectedPatient.fechaInicio}</p>
        <p><strong>Dirección:</strong> ${selectedPatient.direccion}</p>
    `;

    new bootstrap.Modal(document.getElementById('patientModal')).show();
}


function showMedicalHistory() {
    const historyList = document.getElementById('medicalHistoryList');
    historyList.innerHTML = selectedPatient.historialMedico.map(entry => `
        <div class="mb-3 border-bottom pb-3">
            <div class="d-flex justify-content-between">
                <strong>${entry.fecha}</strong>
                <span>${entry.doctor}</span>
            </div>
            <p class="mt-2">${entry.descripcion}</p>
        </div>
    `).join('');

    new bootstrap.Modal(document.getElementById('historyModal')).show();
}


function addHistoryEntry() {
    const newEntry = {
        fecha: document.getElementById('historyDate').value,
        doctor: document.getElementById('doctorName').value,
        descripcion: document.getElementById('historyDescription').value
    };

    if (newEntry.fecha && newEntry.doctor && newEntry.descripcion) {
        selectedPatient.historialMedico.push(newEntry);
        showMedicalHistory();
        

        document.getElementById('historyDate').value = '';
        document.getElementById('doctorName').value = '';
        document.getElementById('historyDescription').value = '';
    }
}


document.getElementById('searchInput').addEventListener('input', (e) => {
    const searchTerm = e.target.value.toLowerCase();
    const filteredPatients = patients.filter(patient => 
        `${patient.nombres} ${patient.apellido1} ${patient.apellido2}`.toLowerCase().includes(searchTerm) ||
        patient.ci.includes(searchTerm)
    );
    loadPatients(filteredPatients);
});


loadPatients();