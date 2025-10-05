<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            {{-- <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo123" srcset=""></a> --}}
                            <h1>SPK Motor BEKAS</h1>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        {{-- <li class="sidebar-item {{ request()->is('profile-showroom') ? 'active' :'' }} ">
                            <a href="/profile-showroom" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li> --}}
                        @if (Auth::guard('web')->user())
                            <li class="sidebar-item {{ request()->is('showroom') ? 'active' :'' }} ">
                                <a href="/showroom" class='sidebar-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>Showroom</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('kriteria') ? 'active' :'' }} ">
                                <a href="/kriteria" class='sidebar-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>Kriteria</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('subkriteria') ? 'active' :'' }} ">
                                <a href="/subkriteria" class='sidebar-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>Subkriteria</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('perhitungan') ? 'active' :'' }} ">
                                <a href="/perhitungan" class='sidebar-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>Perhitungan</span>
                                </a>
                            </li>
                        @endif
                        @if (Auth::guard('showroom')->user())
                            <li class="sidebar-item {{ request()->is('profile-showroom') ? 'active' :'' }} ">
                                <a href="/profile-showroom" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                             <li class="sidebar-item {{ request()->is('produk') ? 'active' :'' }} ">
                                <a href="/produk" class='sidebar-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>Produk</span>
                                </a>
                            </li>
                        @endif
                       
                        

                        <li class="sidebar-item ">
                            <a class="sidebar-link" href="/logout">
                                <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
                        </li>
                        
                        
                        

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>