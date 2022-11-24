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
                        <th>Nama Anggota</th>
                        <th>Email</th>
                        <th>Tanggal Bergabung</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                    foreach ($anggota as $row) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?php
                                $datestring = '%D, %d %F %Y, %h:%i %a';
                                echo mdate($datestring, $row['date_created']); 
                            ?>
                        </td>                  
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>