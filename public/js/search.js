document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const rows = document.querySelectorAll('.table-item tbody tr');

    searchInput.addEventListener('input', function () {
        const searchText = this.value.trim().toLowerCase();

        rows.forEach(function (row) {
            const name = row.querySelector('#nombre-item').textContent.toLowerCase();

            if (name.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Si tabla tiene 0 filas, oculatarla y mostrar mensaje NO HAY REGISTROS
   if (rows.length === 0) {
       document.querySelector('.table-item').style.display = 'none';
       document.querySelector('.no-results').style.display = '';
   } else {
       document.querySelector('.table-item').style.display = '';
       document.querySelector('.no-results').style.display = 'none';
   }



    
});
