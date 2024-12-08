document.addEventListener('DOMContentLoaded', function () {
    function openReportModal() {
        document.getElementById('reportModal').classList.remove('hidden');
        document.getElementById('optionsMenu').classList.add('hidden');
    }

    document.getElementById('openReportButton').addEventListener('click', openReportModal);

    document.getElementById('cancelReport').addEventListener('click', () => {
        document.getElementById('reportModal').classList.add('hidden');
    });
});
