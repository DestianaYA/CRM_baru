
    document.getElementById('searchButton').addEventListener('click', function() {
        // Ambil nilai input search
        var input = document.getElementById('searchInput').value.toLowerCase();
        // Ambil semua baris pada tabel
        var rows = document.getElementById('dataTable').getElementsByTagName('tr');
        
        // Loop melalui semua baris tabel (mulai dari indeks 1 untuk melewati header)
        for (var i = 1; i < rows.length; i++) {
            var nameCell = rows[i].getElementsByTagName('td')[0];
            if (nameCell) {
                var name = nameCell.textContent || nameCell.innerText;
                // Jika nama yang dicari ditemukan dalam teks sel nama, tampilkan baris; jika tidak, sembunyikan
                if (name.toLowerCase().indexOf(input) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    });
