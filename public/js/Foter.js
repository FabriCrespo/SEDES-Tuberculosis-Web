class FooterComponent {
    constructor() {
        this.render();
        this.initializeAnimations();
    }

    render() {
        const footerContainer = document.getElementById('footer-container');
        if (!footerContainer) return;

        footerContainer.innerHTML = `
        <footer class="footer">
            <div class="footer-wave">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
                </svg>
            </div>
            
            <div class="footer-content">
                <div class="footer-section contact-info">
                    <div class="logo-container">
                        <img src="/img/logoMedico.png" alt="Logo Médico" class="footer-logo">
                    </div>
                    <h3>SEDES Cochabamba</h3>
                    <div class="contact-details">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Av. Aniceto Arce N°2876</p>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <p>Lun-Vie 8:00AM - 14:00PM</p>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <p>(529) 4-4221891</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="copyright">
                        <p>&copy; ${new Date().getFullYear()} FluenceSoft, Inc. Todos los derechos reservados.</p>
                    </div>
                    <div class="footer-links">
                        <a href="/privacidad">Privacidad</a>
                        <a href="/terminos">Términos</a>
                        <a href="/soporte">Soporte</a>
                    </div>
                </div>
            </div>
        </footer>
        `;
    }

    initializeAnimations() {
        // Añadir clase para animación de entrada cuando los elementos son visibles
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, {
            threshold: 0.1
        });

        // Observar elementos que queremos animar
        document.querySelectorAll('.footer-section').forEach(section => {
            observer.observe(section);
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new FooterComponent();
});
