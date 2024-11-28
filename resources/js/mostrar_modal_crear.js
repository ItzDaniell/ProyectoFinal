const openModalButton = document.getElementById("openModalButton");
const closeModalButton = document.getElementById("closeModalButton");
const modal = document.getElementById("modal");
const imageInput = document.getElementById("imageInput");
const fileName = document.getElementById("fileName");

if (openModalButton && closeModalButton && modal) {
    openModalButton.addEventListener("click", (e) => {
        e.preventDefault();
        modal.classList.remove("hidden");
    });

    closeModalButton.addEventListener("click", () => {
        modal.classList.add("hidden");
        fileName.textContent = "Ningún archivo seleccionado";
    });
}

if (imageInput) {
    imageInput.addEventListener("change", (e) => {
        fileName.textContent = e.target.files[0]?.name || "Ningún archivo seleccionado";
    });
}

function toggleMenu() {
    const menu = document.getElementById('dropdownMenu');
    if (menu) {
        menu.classList.toggle('hidden');
    }
}

window.addEventListener("click", (e) => {
    if (e.target === modal) {
        const menu = document.getElementById('dropdownMenu');
        if (menu) {
            menu.classList.add("hidden");
        }
    }
});