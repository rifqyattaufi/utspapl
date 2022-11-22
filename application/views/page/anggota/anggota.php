<div class="dash-content">
    <div class="activity">
        <div class="wrap">
            <div class="title">
                <i class="uil uil-users-alt"></i>
                <span class="text">Data Anggota</span>
            </div>
        </div>

        <div class="col-lg-12 col-md-6">
            <?= $this->session->flashdata('message'); ?>  
            <table id="tb_anggota" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Profil</th>
                        <th>Nama Anggota</th>
                        <th>Email</th>
                        <th>Tanggal Bergabung</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                    foreach ($anggota as $row) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <img src="<?= base_url('assets/images/profile/') . $row['image']; ?>" class="img-thumbnail">
                        </td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?php
                                $datestring = '%D, %d %F %Y, %h:%i %a';
                                echo mdate($datestring, $row['date_created']); 
                            ?>
                        </td>
                        <td>
                            <?php if($row['is_active'] == 1)
                            { echo "Aktif"; }
                            else
                            { echo "Tidak Aktif"; }?>
                        </td>                    
                            <td>
                            <?php if ($row['is_active'] == 1) { ?>
                                <a href="<?= base_url('anggota/block/') . $row['id']; ?>">
                                    <button onclick="return confirm('Anda yakin akan mem-block akun ini ?')" class="btn btn-warning p-2 mt-1 text-md text-white">Block</button>
                                </a>
                            <?php } else { ?>
                                <a href="<?= base_url('anggota/activate/') . $row['id']; ?>">
                                    <button onclick="return confirm('Anda yakin akan meng-aktifkan akun ini ?')" class="btn btn-primary p-2 mt-1 text-md">Aktifkan</button>
                                </a>
                            <?php } ?>
                            <a href="<?= base_url('anggota/detail/') . $row['id']; ?>" class="btn btn-info p-2 mt-1">
                                <i class="uil uil-edit"></i> Detail
                            </a>
                            <a href="<?= base_url('anggota/delete/') . $row['id']; ?>" class="btn btn-danger p-2 mt-1" onclick="return confirm('Anda yakin akan menghapus buku ini ?')">
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