document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('#userTable tr');

    tableRows.forEach(function(row) {
        const nameCell = row.querySelector('td:first-child').textContent.toLowerCase();

        if (nameCell.includes(searchValue)) {
            row.style.display = ''; // Show row
        } else {
            row.style.display = 'none'; // Hide row
        }
    });
});