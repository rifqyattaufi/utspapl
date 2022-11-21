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
                    <form action="<?= base_url('buku/add_buku');?>" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kategori Buku</label>
                                    <select class="form-control" name="kategori" required>
                                        <option disabled selected value> -- Pilih Kategori -- </option>
                                        <!-- ........... -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input type="text" class="form-control" name="isbn" placeholder="Contoh ISBN : 978-602-8123-35-8" required>
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" class="form-control" name="judulBuku" placeholder="Contoh : Cara Cepat Belajar Pemrograman Web" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Pengarang</label>
                                    <input type="text" class="form-control" name="penulis" placeholder="Nama Penulis" required>
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input type="text" class="form-control" name="penerbit" placeholder="Nama Penerbit" required>
                                </div>
                            </div>
                            <div class="col-sm-6">                                
                                <div class="form-group">
                                    <label>Tahun Buku</label>
                                    <input type="number" class="form-control" name="thnterbit" placeholder="Tahun Terbit : 2019" required>
                                </div>
                                <div class="form-group">
                                    <label>Sampul Buku <small style="color:green">(gambar)*</small></label>
                                    <input type="file" accept="image/*" name="gambar" required>
                                </div>
                                <div class="form-group">
                                    <label>Lampiran Buku <small style="color:green">(pdf)*</small></label>
                                    <input type="file" accept="application/pdf" name="lampiran" required>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Lainnya</label>
                                    <textarea class="form-control" name="keterangan" required></textarea>
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