const openModalBusquedaButton = document.getElementById("openModalBusquedaButton");
const closeModalBusquedaButton = document.getElementById("closeModalBusquedaButton");
const searchModal = document.getElementById("searchModal");
const searchInput = document.getElementById("searchInput");

if (openModalBusquedaButton && closeModalBusquedaButton && modal) {
    openModalBusquedaButton.addEventListener("click", (e) => {
        e.preventDefault();
        searchModal.classList.remove("hidden");
    });

    closeModalBusquedaButton.addEventListener("click", () => {
        searchInput.value = "";
        document.getElementById('searchResults').innerHTML = '';
        searchModal.classList.add("hidden");
    });
}
