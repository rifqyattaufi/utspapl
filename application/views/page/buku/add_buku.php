<div class="dash-content">
    <div class="activity">
        <div class="wrap">
            <div class="title">
                <i class="uil uil-plus-circle"></i>
                <span class="text">Add Data Buku</span>
            </div>
        </div>

        <div class="row" style="width: 100%; margin-bottom: 100px;">
            <div class="col-md-12">
                <div class="wrap-input">
                    <form action="<?= base_url('buku/add_buku');?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kategori Buku</label>
                                    <select class="form-control" name="id_kategori" required>
                                        <option disabled selected value> -- Pilih Kategori -- </option>
                                        <?php foreach ($kategori as $row) { ?>
                                            <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input type="text" class="form-control" name="isbn" placeholder="Contoh ISBN : 978-602-8123-35-8" required>
                                    <?= form_error('isbn', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Contoh : Cara Cepat Belajar Pemrograman Web" required>
                                    <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Penulis</label>
                                    <input type="text" class="form-control" name="penulis" placeholder="Masukkan Nama Penulis" required>
                                    <?= form_error('penulis', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Nama Penerbit" required>
                                    <?= form_error('penerbit', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6">                                
                                <div class="form-group">
                                    <label>Tahun Buku</label>
                                    <input type="number" class="form-control" name="tahun" placeholder="Tahun Terbit : 2019" required>
                                    <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Sampul Buku <small style="color:green">(gambar)*</small></label>
                                    <input type="file" accept="image/*" name="gambar">
                                </div>
                                <div class="form-group">
                                    <label>Lampiran Buku <small style="color:green">(pdf)*</small></label>
                                    <input type="file" accept="application/pdf" name="lampiran">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Lainnya <small style="color:green">(opsional)</small></label>
                                    <textarea class="form-control" name="keterangan"></textarea>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button> 
                                    <a href="<?= base_url('buku');?>" class="btn btn-danger btn-lg">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>