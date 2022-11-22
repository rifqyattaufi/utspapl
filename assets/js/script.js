const body = document.querySelector('body'),
      modeToggle = body.querySelector('.mode-toggle'),
      sidebar = body.querySelector('nav'),
      sidebarToggle = body.querySelector('.sidebar-toggle');

modeToggle.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
});

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