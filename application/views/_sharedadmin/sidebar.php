<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
        <li><a href="<?= base_url('admin/Home')?>" class="app-menu__item active" href="dashboard.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Home</span></a></li>
        <li><a class="app-menu__item" href="<?= base_url('admin/profile')?>"><i class="icon fa fa-circle-o"></i><span class="app-menu__label">Profil</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">User</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url('admin/siswa')?>"><i class="icon fa fa-user"></i><span class="app-menu__label">Siswa</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/staff')?>"><i class="icon fa fa-user"></i><span class="app-menu__label">Staff Almira</span></a></li>
         </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Master Data</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url('admin/paket') ?>"><i class="icon fa fa-circle-o"></i><span class="app-menu__label">Paket</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/kendaraan')?>"><i class="icon fa fa-circle-o"></i><span class="app-menu__label">Kendaraan</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/jadwal')?>"><i class="icon fa fa-circle-o"></i><span class="app-menu__label">Jadwal</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/kriteria')?>"><i class="icon fa fa-circle-o"></i><span class="app-menu__label">Kriteria Nilai</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/persyaratan')?>"><i class="icon fa fa-circle-o"></i><span class="app-menu__label">Persyaratan</span></a></li>
         </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Laporan</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url('admin/laporan/siswa') ?>"><i class="icon fa fa-circle-o"></i><span class="app-menu__label">Lap. Siswa</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/laporan/staf')?>"><i class="icon fa fa-circle-o"></i><span class="app-menu__label">Lap. Staf</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/laporan/kendaraan')?>"><i class="icon fa fa-circle-o"></i><span class="app-menu__label">Lap. Kendaraan</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/laporan/keuangan')?>"><i class="icon fa fa-circle-o"></i><span class="app-menu__label">Lap. Keuangan</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/laporan/grafik')?>"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Grafik</span></a></li>
         </ul>
        </li>
      </ul>
    </aside>