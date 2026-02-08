<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ route('dashboard') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    @php
        $userManagementOpen =
            request()->routeIs('permissions.*') || request()->routeIs('roles.*') || request()->routeIs('users.*');
    @endphp

    @php
        $studentManagementOpen = request()->routeIs('students.*');
    @endphp

    @php
        $categoryManagementOpen = request()->routeIs('categories.*') || request()->routeIs('products.*');
    @endphp

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">

                <li class="nav-item {{ $userManagementOpen ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $userManagementOpen ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            User Management
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}"
                                class="nav-link {{ request()->routeIs('permissions.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"
                                class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- student Management --}}

                <li class="nav-item {{ $studentManagementOpen ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $studentManagementOpen ? 'active' : '' }} ">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Student Management
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('students.index') }}"
                                class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }} ">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Students</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- category management --}}

                <li class="nav-item {{ $categoryManagementOpen ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $categoryManagementOpen ? 'active' : '' }} ">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Product Management
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('categories.index')}}"
                                class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }} ">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('products.index')}}"
                                class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }} ">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Products</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
