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
                    <i class="bi bi-clipboard"></i>
                    <span>Laporan Semester</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('laporan-akhir*') ? '' : 'collapsed' }}" href="/laporan-akhir">
                    <i class="bi bi-clipboard2-fill"></i>
                    <span>Laporan Pertanggungjawaban</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('update-profil*') ? '' : 'collapsed' }}" href="/update-profil">
                    <i class="bi bi-arrow-up-circle"></i>
                    <span>Update Profil BUMDesa</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link {{ Request::is('profil-pasar*') ? '' : 'collapsed' }}" href="/profil-pasar">
                    <i class="bi bi-shop-window"></i>
                    <span>Update Profil Pasar Desa</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('kanal-surat*') ? '' : 'collapsed' }}" href="/kanal-surat">
                    <i class="bi bi-chat-right-text"></i>
                    <span>Kanal Persuratan</span>
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
                    <i class="bi bi-clipboard"></i>
                    <span>Laporan Semester</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('laporan-akhir-admin*') ? '' : 'collapsed' }}"
                    href="/laporan-akhir-admin">
                    <i class="bi bi-clipboard2-fill"></i>
                    <span>Laporan Pertanggung Jawaban</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('update-profil-admin*') ? '' : 'collapsed' }}"
                    href="/update-profil-admin">
                    <i class="bi bi-arrow-up-circle"></i>
                    <span>Update Profil BUMDesa</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link {{ Request::is('profil-pasar-admin*') ? '' : 'collapsed' }}" href="/profil-pasar-admin">
                    <i class="bi bi-shop-window"></i>
                    <span>Update Profil Pasar Desa</span>
                </a>
            </li><!-- End Dashboard Nav -->



            <li class="nav-item">
                <a class="nav-link {{ Request::is('kanal-surat-admin*') ? '' : 'collapsed' }}" href="/kanal-surat-admin">
                    <i class="bi bi-chat-right-text"></i>
                    <span>Kanal Persuratan</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('register*') ? '' : 'collapsed' }}" href="/register">
                    <i class="bi bi-r-square"></i>
                    <span>Register Desa</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Jadwal</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('buka-fitur*') ? '' : 'collapsed' }}" href="/buka-fitur">
                    <i class="bi bi-calendar"></i>
                    <span>Jadwal Halaman</span>
                </a>
            </li><!-- End Dashboard Nav -->
        @endcan


    </ul>

</aside><!-- End Sidebar-->
