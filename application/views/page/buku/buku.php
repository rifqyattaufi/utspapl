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

        <?= $this->session->flashdata('message'); ?>  
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
            <?php $no = 1;
                foreach ($buku as $row) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['isbn']; ?></td>
                    <td><?= $row['judul_buku']; ?></td>
                    <td><?= $row['penulis']; ?></td>
                    <td><?= $row['penerbit']; ?></td>
                    <td><?= $row['tahun_buku']; ?></td>
                    <td><?php if($row['status'] == 1)
                        { echo "Tersedia"; }
                        else
                        { echo "Tidak Tersedia"; }?>
                    </td>                    
                    <td>
                        <a href="<?= base_url('buku/edit_buku/') . $row['id_buku']; ?>" class="btn btn-info p-2 mt-1">
                            <i class="uil uil-edit"></i> Ubah
                        </a>
                        <a href="<?= base_url('buku/delete_buku/') . $row['id_buku']; ?>" class="btn btn-danger p-2 mt-1" onclick="return confirm('Anda yakin akan menghapus buku ini ?')">
                            <i class="uil uil-trash-alt"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>