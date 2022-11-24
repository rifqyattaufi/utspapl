<nav>
    <div class="logo-name">
        <div class="logo-image">
            <i class="uil uil-diary"></i>
        </div>
        <span class="logo-name">Perpustakaan Online</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="<?= base_url('user'); ?>"">
                    <i class=" uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
            <li><a href="<?= base_url('buku'); ?>">
                    <i class="uil uil-books"></i>
                    <span class="link-name">Data Buku</span>
                </a></li>
                <?php
                    if($this->session->userdata('role') == 0){
                ?>
                    <li><a href="<?= base_url('kategori'); ?>">
                        <i class="uil uil-tag"></i>
                        <span class="link-name">Data Kategori</span>
                    </a></li>
                    
                    <li><a href="<?= base_url('anggota'); ?>">
                        <i class="uil uil-user"></i>
                        <span class="link-name">Data Anggota</span>
                    </a></li>
                <?php
                    }
                ?>
        </ul>

        <ul class="logout-mode">
            <li><a href="<?= base_url('auth/logout') ?>">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
        </ul>
    </div>
</nav>

<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        <h1>
            <!-- <?= $title ?> -->
        </h1>
        <!-- <img src="<?= base_url('assets/') ?>images/user.jpg" alt="avatar"> -->
    </div>