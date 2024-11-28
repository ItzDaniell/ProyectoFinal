document.addEventListener("DOMContentLoaded", () => {
    const toggleMenuButton = document.querySelector('a[onclick="toggleMenu()"]');
    const dropdownMenu = document.getElementById("dropdownMenu");

    function toggleMenu() {
        dropdownMenu.classList.toggle("hidden");
        document.addEventListener("click", closeMenuOnOutsideClick);
    }

    function closeMenuOnOutsideClick(event) {
        if (!dropdownMenu.contains(event.target) && event.target !== toggleMenuButton) {
            dropdownMenu.classList.add("hidden");
            document.removeEventListener("click", closeMenuOnOutsideClick);
        }
    }

    if (toggleMenuButton) {
        toggleMenuButton.addEventListener("click", (event) => {
            event.stopPropagation();
            toggleMenu();
        });
    }
});
