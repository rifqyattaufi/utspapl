const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      sidebarToggle = body.querySelector('.sidebar-toggle');

sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('close');
});

$(document).ready(function () {
    $('#tb_buku').DataTable({
        responsive: true
    });

    $('#tb_anggota').DataTable({
        responsive: true
    });
    
    $('#tb_kategori').DataTable({
        responsive: true
    });
});