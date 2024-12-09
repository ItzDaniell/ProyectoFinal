document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.options-button');
    const menus = document.querySelectorAll('.options-menu');

    buttons.forEach((button, index) => {
        const menu = menus[index]; // Relaciona el botón con su menú correspondiente

        button.addEventListener('click', (event) => {
            event.stopPropagation(); // Evita que el evento se propague al listener global
            const isMenuOpen = !menu.classList.contains('hidden');

            // Cierra todos los menús antes de abrir o cerrar el actual
            menus.forEach(m => m.classList.add('hidden'));

            // Alterna el menú actual solo si no estaba abierto
            if (!isMenuOpen) {
                menu.classList.remove('hidden');
            }
        });
    });

    // Cierra todos los menús al hacer clic fuera de ellos
    document.addEventListener('click', () => {
        menus.forEach(menu => menu.classList.add('hidden'));
    });
});
