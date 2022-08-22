<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="<?= base_url() ?>/template/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <!-- <li class="sidebar-title">Menu</li> -->

                <li class="sidebar-item  <?= (($active == 'dashboard') ? 'active' : '') ?>">
                    <a href="<?= base_url() . 'dashboard' ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item  <?= (($active == 'barang') ? 'active' : '') ?>">
                    <a href="<?= base_url() . 'barang' ?>" class='sidebar-link'>
                        <i class="fa fa-box"></i>
                        <span>Barang</span>
                    </a>
                </li>

                <li class="sidebar-item <?= (($active == 'stokMasuk') ? 'active' : ''); (($active == 'stokMasuk') ? 'active' : '') ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Stok</span>
                    </a>
                    <ul class="submenu <?= (($active == 'stokMasuk') ? 'active' : ''); (($active == 'stokMasuk') ? 'active' : '') ?> timelineVersion">
                        <li class="submenu-item <?= (($active == 'stokMasuk') ? 'active' : '') ?>">
                            <a href="<?= base_url() . 'stokMasuk' ?>">Stok Masuk</a>
                        </li>
                        <li class="submenu-item <?= (($active == 'stokKeluar') ? 'active' : '') ?>">
                            <a href="<?= base_url() . 'stokKeluar' ?>">Stok Keluar</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>