<div class="dash-content">
    <div class="activity">
        <div class="wrap">
            <div class="title">
                <i class="uil uil-tag"></i>
                <span class="text">Data Kategori</span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="wrap-input">
                    <form action="<?= base_url('kategori/add_kategori'); ?>" method="post">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori">
                            <?= form_error('nama_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="reset" class="ml-3 btn btn-secondary">Reset</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <?= $this->session->flashdata('message'); ?>  
                <table id="tb_kategori" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                        foreach ($kategori as $row) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama_kategori']; ?></td>
                            <td>
                                <a href="<?= base_url('kategori/edit/') . $row['id_kategori']; ?>" class="btn btn-info p-2 mt-1">
                                    <i class="uil uil-edit"></i> Edit
                                </a>
                                <a href="<?= base_url('kategori/delete/') . $row['id_kategori']; ?>" class="btn btn-danger p-2 mt-1" onclick="return confirm('Anda yakin akan menghapus buku ini ?')">
                                    <i class="uil uil-trash-alt"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>