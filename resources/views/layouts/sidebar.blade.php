<div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="/"><img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo" srcset=""></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item {{ Request::is('/', 'arsipsurat') ? 'active' : '' }} ">
                <a href="/" class='sidebar-link'>
                    <i class="bi bi-archive-fill"></i>
                    <span>Arsip Surat</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('about') ? 'active' : '' }} ">
                <a href="/about" class='sidebar-link'>
                    <i class="bi bi-person-badge-fill"></i>
                    <span>About</span>
                </a>
            </li>
        </ul>
    </div>
</div>
