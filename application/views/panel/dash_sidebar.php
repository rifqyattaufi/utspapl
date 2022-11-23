<nav>
    <a href="<?= base_url() ?>">
        <div class="logo-name">
            <div class="logo-image">
                <!-- <img src="<?= base_url('assets/') ?>images/avatar.jpg" alt="logo"> -->
                <i class="uil uil-diary"></i>
            </div>
            <span class="logo-name">Perpustakaan Online</span>
        </div>
    </a>

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
            <li><a href="<?= base_url('kategori'); ?>">
                    <i class="uil uil-tag"></i>
                    <span class="link-name">Data Kategori</span>
                </a></li>
            <li><a href="<?= base_url('anggota'); ?>"">
                    <i class=" uil uil-users-alt"></i>
                    <span class="link-name">Data Anggota</span>
                </a></li>
        </ul>

        <ul class="logout-mode">
            <li><a href="<?= base_url('auth/logout') ?>">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>


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