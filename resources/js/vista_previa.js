document.addEventListener("DOMContentLoaded", () => {
    const imagenInput = document.getElementById("imagen");
    const preview = document.getElementById("preview");

    if (imagenInput) {
        imagenInput.addEventListener("change", (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove("hidden");
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "#";
                preview.classList.add("hidden");
            }
        });
    }

    const clearButton = document.getElementById("clear-button");
    if (clearButton) {
        clearButton.addEventListener("click", () => {
            preview.src = "#";
            preview.classList.add("hidden");
            imagenInput.value = "";
        });
    }
});