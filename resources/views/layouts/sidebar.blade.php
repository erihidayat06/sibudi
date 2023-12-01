<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @can('n_admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? '' : 'collapsed' }}" href="/">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('laporan-semester*') ? '' : 'collapsed' }}" href="/laporan-semester">
                    <i class="bi bi-grid"></i>
                    <span>Laporan Semester</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('laporan-akhir*') ? '' : 'collapsed' }}" href="/laporan-akhir">
                    <i class="bi bi-grid"></i>
                    <span>Laporan Akhir Tahun</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('update-profil*') ? '' : 'collapsed' }}" href="/update-profil">
                    <i class="bi bi-grid"></i>
                    <span>Update Profil BUMDesa</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link {{ Request::is('kanal-pengaduan*') ? '' : 'collapsed' }}" href="/kanal-pengaduan">
                    <i class="bi bi-grid"></i>
                    <span>Kanal Pengaduan</span>
                </a>
            </li><!-- End Dashboard Nav -->
        @endcan


        {{-- Sidebar Admin --}}
        @can('admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? '' : 'collapsed' }}" href="/">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('laporan-semester-admin*') ? '' : 'collapsed' }}"
                    href="/laporan-semester-admin">
                    <i class="bi bi-grid"></i>
                    <span>Laporan Semester</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('laporan-akhir-admin*') ? '' : 'collapsed' }}"
                    href="/laporan-akhir-admin">
                    <i class="bi bi-grid"></i>
                    <span>Laporan Akhir Tahun</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('update-profil-admin*') ? '' : 'collapsed' }}"
                    href="/update-profil-admin">
                    <i class="bi bi-grid"></i>
                    <span>Update Profil BUMDesa</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link {{ Request::is('kanal-pengaduan-admin*') ? '' : 'collapsed' }}"
                    href="/kanal-pengaduan-admin">
                    <i class="bi bi-grid"></i>
                    <span>Kanal Pengaduan</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('register*') ? '' : 'collapsed' }}" href="/register">
                    <i class="bi bi-grid"></i>
                    <span>Register Desa</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Jadwal</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('buka-fitur*') ? '' : 'collapsed' }}" href="/buka-fitur">
                    <i class="bi bi-grid"></i>
                    <span>Jadwal Halaman</span>
                </a>
            </li><!-- End Dashboard Nav -->
        @endcan


    </ul>

</aside><!-- End Sidebar-->
