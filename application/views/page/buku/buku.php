<div class="dash-content">
    <div class="activity">
        <div class="wrap">
            <div class="title">
                <i class="uil uil-books"></i>
                <span class="text">Data Buku</span>
            </div>
            <div class="add-btn">
                <i class="uil uil-plus-circle"></i>
                <a href="<?= base_url('buku/add_buku'); ?>" class="btn-add">Tambah Buku</a>
            </div>
        </div>

        <table id="tb_buku" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ISBN</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>978-602-8123-35-8</td>
                    <td>Cara Cepat Belajar Pemrograman Web</td>
                    <td>Indra Susanto</td>
                    <td>Jasakom</td>
                    <td>2013</td>
                    <td>Tersedia</td>                    
                    <td>
                        <a href="" class="btn btn-info p-2 mt-1">
                            <i class="uil uil-edit"></i> Ubah
                        </a>
                        <a href="" class="btn btn-danger p-2 mt-1">
                            <i class="uil uil-trash-alt"></i> Hapus
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>