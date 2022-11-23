<div class="dash-content">
    <div class="overview">
        <div class="title">
            <span class="text">Selamat Datang, <?= $this->session->name ?></span>
        </div>
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">Dashboard</span>
        </div>

        <div class="boxes">
            <div class="box box1">
                <i class="uil uil-books"></i>
                <span class="text">Jumlah Buku</span>
                <span class="number"><?= $buku; ?></span>
            </div>
            <div class="box box2">
                <i class="uil uil-file-upload-alt"></i>
                <span class="text">Buku dipinjam</span>
                <span class="number"><?= $dipinjam ?></span>
            </div>
            <div class="box box3">
                <i class="uil uil-users-alt"></i>
                <span class="text">User Terdaftar</span>
                <span class="number"><?= $user ?></span>
            </div>
        </div>
    </div>
    <!-- 
    <div class="activity">
        <div class="title">
            <i class="uil uil-clock-three"></i>
            <span class="text">Recent Activity</span>
        </div>
    </div> -->

</div>