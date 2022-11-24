<div class="dash-content">
    <div class="activity">
        <div class="wrap">
            <div class="title">
                <i class="uil uil-tag"></i>
                <span class="text">Data Kategori</span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="wrap-input">
                    <form action="<?= base_url('kategori/edit/'.$kategori['id_kategori']); ?>" method="post">
                        <div class="form-group">
                            <input type="hidden" value="<?= $kategori['id_kategori'] ?>" name="id" id="id" >
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori"
                            value="<?= $kategori['nama_kategori'] ?>">
                            <?= form_error('nama_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <button type="reset" class="ml-3 btn btn-secondary">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>