const openModalCrearButton = document.getElementById("openModalCrearButton");
const closeModalCrearButton = document.getElementById("closeModalCrearButton");
const modal = document.getElementById("modal");
const imageInput = document.getElementById("imageInput");
const fileName = document.getElementById("fileName");

if (openModalCrearButton && closeModalCrearButton && modal) {
    openModalCrearButton.addEventListener("click", (e) => {
        e.preventDefault();
        modal.classList.remove("hidden");
    });

    closeModalCrearButton.addEventListener("click", () => {
        modal.classList.add("hidden");
        fileName.textContent = "Ningún archivo seleccionado";
    });
}

if (imageInput) {
    imageInput.addEventListener("change", (e) => {
        fileName.textContent = e.target.files[0]?.name || "Ningún archivo seleccionado";
    });
}
