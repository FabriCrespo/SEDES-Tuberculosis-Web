class MenuComponent {
    constructor() {
        this.render();
    }

    render() {
        const menuContainer = document.getElementById('menu-container');
        if (!menuContainer) return;

        menuContainer.innerHTML = `
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a href="/">
                        <img src="/img/logotuberculosis.png" alt="Logo" class="logoMenu">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/pacientes">Pacientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/pacientes/registro">Registrar Pacientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/documentacion">Documentación</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary" href="/login">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        `;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new MenuComponent();
});