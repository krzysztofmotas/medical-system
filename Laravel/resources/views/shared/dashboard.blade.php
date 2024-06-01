@extends('shared.template')

@section('body')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('dashboard.index') }}" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bolder">
                            <i class="bx bx-plus-medical me-1 text-primary"></i>
                            medical system
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    @yield('menu')
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- User -->
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <span class="fw-semibold">
                                        @if (Auth::user()->is_doctor)
                                            <span class="badge bg-success">Lekarz</span>
                                        @else
                                            <span class="badge bg-primary">Pacjent</span>
                                        @endif
                                        {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @if (!Auth::user()->is_doctor)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('patient.settings') }}">
                                                <i class="bx bxs-cog me-2"></i>
                                                <span class="align-middle">Ustawienia</span>
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Wyloguj się</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!--/ User -->
                    </div>
                </nav>

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">
                            @hasSection('title')
                                <span class="text-muted fw-light">Strona główna /</span> @yield('title')
                            @else
                                Strona główna
                            @endif
                        </h4>

                        @yield('content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>, stworzone z ❤️ przez
                                <a href="https://themeselection.com" target="_blank"
                                    class="footer-link fw-bolder">ThemeSelection</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
@endsection
