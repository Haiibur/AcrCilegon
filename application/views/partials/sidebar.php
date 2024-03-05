<div class="sidebar">
    <a href="#"
        class="sidebarCollapse float-right h6 dropdown-menu-right mr-2 mt-2 position-absolute d-block d-lg-none">
        <i class="icon-close"></i>
    </a>
    <a href="<?= base_url('Home'); ?>" class="sidebar-logo d-flex">
        <img src="<?= base_url('assets/img/Lambang_Kota_Cilegon.png'); ?>" alt="Lambang_Kota_Cilegon" width="80"
            class="img-fluid mr-2" />

    </a>
    <ul id="side-menu" class="sidebar-menu">
        <li>
            <a href="<?= base_url('Home'); ?>">
                <i class="icon-home"></i>
                Beranda
            </a>
        </li>
        <li class="dropdown">
            <a href="#">
                <i class="fas fa-grip-horizontal"></i>Website
            </a>
            <div>
                <ul>
                    <li>
                        <a href="<?= base_url('Lokasi_Vanue'); ?>">
                            <i class="icon-location-pin"></i>
                            Lokasi Vanue
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Lokasi_Tujuan'); ?>">
                            <i class="icon-location-pin"></i>
                            Lokasi Tujuan
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('agenda'); ?>">
                            <i class="icon-notebook"></i>
                            Agenda
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Hotel'); ?>">
                            <i class="fa-solid fa-building"></i>
                            Hotel
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Wisata'); ?>">
                            <i class="icon-plane"></i>
                            Wisata
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Galleri'); ?>">
                            <i class="icon-picture"></i>
                            Galleri
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="dropdown">
            <a href="#"> <i class="fas fa-grip-horizontal"></i>Informasi</a>
            <div>
                <ul>
                    <li>
                        <a href="<?= base_url('#'); ?>">
                            <i class="icon-picture"></i>
                            Berita Terbaru
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Materi'); ?>">
                            <i class="icon-book-open"></i>
                            Materi
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="dropdown">
            <a href="#">
                <i class="fas fa-grip-horizontal"></i>Peserta
            </a>
            <div>
                <ul>
                    <li>
                        <a href="<?= base_url('Undangan'); ?>">
                            <i class="fas fa-grip-horizontal"></i>
                            Undangan
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Pendaftaran'); ?>">
                            <i class="fas fa-grip-horizontal"></i>
                            Pendaftaran
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Absen_Kehadiran'); ?>">
                            <i class="fas fa-grip-horizontal"></i>
                            Absensi
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <a href="<?= base_url('#'); ?>">
                <i class="fas fa-grip-horizontal"></i>
                Order Produk Pujasangon
            </a>
        </li>
        <li class="dropdown">
            <a href="#"><i class="icon-settings"></i>Pengaturan</a>
            <div>
                <ul>
                    <li>
                        <a href="<?= base_url('profil'); ?>">
                            <i class="fa-solid fa-user-tie"></i>
                            Profil Sistem
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin'); ?>">
                            <i class="fas fa-grip-horizontal"></i>
                            Administrator
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Level_Peserta'); ?>">
                            <i class="fa-solid fa-users"></i>
                            Level Admin
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>