<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard">Aplikasi Event Fashion</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">ADBA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a></li>


            <li class="menu-header">Master Data</li>
            {{-- <li class="{{ Request::is('users*')?'active':'' }}"><a class="nav-link" href="/users"><i class="fas fa-users"></i> <span>Users</span></a></li> --}}
            <li class="{{ Request::is('data-kriterias*') ? 'active' : '' }}"><a class="nav-link" href="/data-kriterias"><i
                        class="fas fa-database"></i> <span>Kriteria</span></a></li>
            <li class="{{ Request::is('data-range*') ? 'active' : '' }}"><a class="nav-link" href="/data-ranges"><i
                        class="fas fa-sliders-h"></i> <span>Range Kriteria</span></a></li>
            {{-- <li class="{{ Request::is('data-kecamatans*')?'active':'' }}"><a class="nav-link" href="/data-kecamatans"><i class="fas fa-users"></i> <span>Kecamatan</span></a></li> --}}
            <li class="menu-header">Perhitungan</li>
            <li class="{{ Request::is('penentuans*') ? 'active' : '' }}"><a class="nav-link" href="/penentuans"><i
                        class="fas fa-sort-amount-down"></i><span>Penentuan</span></a></li>
            <li class="{{ Request::is('nilai-profils*') ? 'active' : '' }}"><a class="nav-link" href="/nilai-profils"><i
                        class="fas fa-sort-amount-down"></i><span>Nilai GAP</span></a></li>
            <li class="{{ Request::is('ranking*') ? 'active' : '' }}"><a class="nav-link" href="/ranking"><i
                        class="fas fa-trophy"></i><span>Ranking</span></a></li>






    </aside>
</div>
