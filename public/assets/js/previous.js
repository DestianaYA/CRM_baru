// Simpan URL saat halaman dimuat
    function goBack() {
        var previousUrl = sessionStorage.getItem('previous_url') || '/';
        sessionStorage.removeItem('previous_url');
        window.location.href = previousUrl;
    }
