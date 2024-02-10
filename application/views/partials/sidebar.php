<div class="sidebar">
    <a href="#"
        class="sidebarCollapse float-right h6 dropdown-menu-right mr-2 mt-2 position-absolute d-block d-lg-none">
        <i class="icon-close"></i>
    </a>

    <!-- START: Logo-->
    <a href="<?= base_url('home'); ?>" class="sidebar-logo d-flex">
        <img src="<?= base_url('assets/img/logoasistenku.png'); ?>" alt="Asistenku" width="80" class="img-fluid mr-2" />
    </a>
    <!-- END: Logo-->

    <!-- START: Menu-->
    <ul id="side-menu" class="sidebar-menu">
        <li><a href="<?= base_url('home'); ?>"><i class="icon-home"></i>Beranda</a>
        <li><a href="<?= base_url('agenda'); ?>"><i class="fas fa-window-restore"></i>Agenda</a>
        <li><a href="<?= base_url('Agenda_Acara'); ?>"><i class="fas fa-grip-horizontal"></i>Agenda Acara</a>
        <li><a href="<?= base_url('Lokasi_venue'); ?>"><i class="icon-location"></i>Lokasi Venue</a>
        <li><a href="<?= base_url('Hotel'); ?>"><i class="fas fa-synagogue"></i>Hotel</a>
        <li><a href="<?= base_url('Galleri'); ?>"><i class="fas fa-photo-video"></i>Galleri</a>
        <li><a href="<?= base_url('Wisata'); ?>"><i class="icon-tree"></i>Wisata</a>
        <li><a href="<?= base_url('Materi'); ?>"><i class="fas fa-grip-horizontal"></i>Materi</a>
        <li><a href="<?= base_url('Umdangan'); ?>"><i class="fas fa-grip-horizontal"></i>Undangan</a>
        <li><a href="<?= base_url('Pendaftaran'); ?>"><i class="fas fa-grip-horizontal"></i>Pendaftaran</a>
        <li><a href="<?= base_url('Kehadiran'); ?>"><i class="fas fa-grip-horizontal"></i>Kehadiran</a>

        <li class="dropdown">
            <a href="#"><i class="icon-settings"></i>Pengaturan</a>
            <div>
                <ul>
                    <li><a href="<?= base_url('admin'); ?>"><i class="icon-user"></i> Administrator</a></li>
                    <li><a href="<?= base_url('profil'); ?>"><i class="fas fa-grip-horizontal"></i> Profil Sistem</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <!-- END: Menu-->
</div>