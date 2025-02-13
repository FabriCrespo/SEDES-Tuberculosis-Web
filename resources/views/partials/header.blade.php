<header>
    <nav class="navbar">
        <div class="container-header">
            <!-- Logo -->
            <a href="/">
                <img src="/images/logotuberculosis.png" alt="Logo" class="logo">
            </a>

            <!-- Botón de menú para móviles -->
            <button class="menu-toggle" id="menu-toggle">
                ☰
            </button>

            <!-- Menú de navegación -->
            <div class="menu" id="menu">
                <ul>
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/patients">Pacientes</a></li>
                    <li><a href="/patients/registro">Registrar Pacientes</a></li>
                    <li><a href="/documentation">Documentación</a></li>
                    <li><a href="/login" class="btn-primary">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Script para menú móvil -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        document.getElementById('menu').classList.toggle('active');
    });
</script>

<!-- Importar el CSS -->
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
