// Funcionalidad para abrir y cerrar el dropdown de búsqueda
document.getElementById("searchIcon").addEventListener("click", function() {
    const searchDropdown = document.getElementById("searchDropdown");
    const busqueda = document.getElementById('busqueda')
    searchDropdown.classList.toggle("hidden");
});

// Funcionalidad para abrir y cerrar el dropdown de filtro
document.getElementById("filterIcon").addEventListener("click", function() {
    const filterDropdown = document.getElementById("filterDropdown");
    filterDropdown.classList.toggle("hidden");
});

// Cerrar dropdown al hacer clic fuera de los iconos
document.addEventListener("click", function(event) {
    if (!event.target.closest(".flex")) {
        document.getElementById("searchDropdown").classList.add("hidden");
        document.getElementById("filterDropdown").classList.add("hidden");
    }
});
