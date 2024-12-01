const banPermanenteCheckbox = document.querySelector('input[name="ban_permanente"]');
const banTemporalDiv = document.getElementById('ban_temporal');
const tiempo_ban = document.querySelector('input[name="fecha_baneo"]');


if (!banPermanenteCheckbox.checked) {
    banTemporalDiv.classList.remove('hidden');
}

banPermanenteCheckbox.addEventListener('change', function() {
    if (this.checked) {
        banTemporalDiv.classList.add('hidden');
        tiempo_ban.required = false;
    } else {
        banTemporalDiv.classList.remove('hidden');
        tiempo_ban.required = true;
    }
});
