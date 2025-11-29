// Seleccionamos elementos
const modal = document.getElementById('courseModal');
const openButtons = document.querySelectorAll('.curso-button');
const closeButton = document.querySelector('.close-button');

// Abrir modal
openButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault(); // Evita que el link navegue
        const cursoCard = btn.closest('.curso-card');
        const cursoNombre = cursoCard.querySelector('.curso-nombre').textContent;
        modal.querySelector('.modal-title').textContent = 'Accede a las secciones del curso: ' +
            cursoNombre;
        modal.style.display = 'flex';
    });
});

// Cerrar modal
closeButton.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Cerrar modal si se hace click fuera del contenido
window.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.style.display = 'none';
    }
});