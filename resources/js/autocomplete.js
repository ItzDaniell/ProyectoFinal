document.getElementById('searchInput').addEventListener('input', function () {
    const query = this.value;

    if (query.length <= 2) {
        document.getElementById('searchResults').innerHTML = '';
        return;
    }

    fetch(`/autocomplete?query=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            const resultsContainer = document.getElementById('searchResults');
            resultsContainer.innerHTML = '';

            if (data.length === 0) {
                const noResultsMessage = document.createElement('div');
                noResultsMessage.textContent = 'No se encontraron resultados.';
                noResultsMessage.className = 'text-gray-500 text-center p-4';
                resultsContainer.appendChild(noResultsMessage);
                return;
            }

            // Renderizar resultados
            data.forEach(user => {
                const item = document.createElement('a');
                item.href = `/perfil-usuario/${user.slug}`;
                item.className = 'flex items-center space-x-4 p-2 border-b hover:bg-gray-100 cursor-pointer';

                const img = document.createElement('img');
                if (user.profile_photo_path) {
                    img.src = `/storage/${user.profile_photo_path}`;
                } else if (user.avatar) {
                    img.src = user.avatar;
                } else {
                    img.src = "https://cdn-icons-png.flaticon.com/512/149/149071.png";
                }
                img.alt = `${user.name}`;
                img.className = 'w-12 h-12 rounded-full';

                const name = document.createElement('span');
                name.textContent = user.name;
                name.className = 'text-gray-800 font-medium';

                item.appendChild(img);
                item.appendChild(name);

                resultsContainer.appendChild(item);
            });
        })
        .catch(error => {
            console.error('Error fetching autocomplete results:', error);
        });
});
