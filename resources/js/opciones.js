document.addEventListener('DOMContentLoaded', function () {
    const optionsButton = document.getElementById('optionsButton');
    const optionsMenu = document.getElementById('optionsMenu');

    if (optionsButton && optionsMenu) {
        optionsButton.addEventListener('click', function () {
            optionsMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function (event) {
            if (!optionsButton.contains(event.target) && !optionsMenu.contains(event.target)) {
                optionsMenu.classList.add('hidden');
            }
        });
    }
});