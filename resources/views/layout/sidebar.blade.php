<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href=" /" target="_blank">
            <img src="{{ asset('../assets/img/capil.png') }}" class="navbar-brand-img" alt="main_logo">
            <span class="ms-1 text-sm text-dark">Capil</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('/') ? 'active text-primary' : 'text-dark' }}" href="/">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('rekapitulasi') ? 'active text-primary' : 'text-dark' }}"
                    href="{{ route('rekapitulasi.index') }}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Rekapitulasi</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
