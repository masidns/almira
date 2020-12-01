<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
        <li><a href="<?= base_url('Home')?>" class="app-menu__item active" href="dashboard.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Home</span></a></li>
        <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul>
        </li> -->
        <li><a class="app-menu__item" href="<?= base_url('admin/profile')?>"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Profil</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">User</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url('admin/siswa')?>"><i class="icon fa fa-user"></i><span class="app-menu__label">Siswa</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/staff')?>"><i class="icon fa fa-user"></i><span class="app-menu__label">Staff Almira</span></a></li>
         </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Master Data</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url('admin/paket') ?>"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Paket</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/kendaraan')?>"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Kendaraan</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/jadwal')?>"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Jadwal</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/kriteria')?>"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Kriteria Nilai</span></a></li>
            <li><a class="treeview-item" href="<?= base_url('admin/persyaratan')?>"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Persyaratan</span></a></li>
         </ul>
        </li>
        <!-- <li><a class="app-menu__item" href="<?= base_url('admin/penilaian')?>"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Penilaian</span></a></li> -->
        <!-- <li><a class="app-menu__item" href="<?= base_url('admin/pembayaran')?>"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Pembayaran</span></a></li> -->
        <!-- <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Docs</span></a></li> -->
      </ul>
    </aside>