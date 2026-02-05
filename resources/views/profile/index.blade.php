@include('admindashboardlayout.header')

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">

        @include('admindashboardlayout.menubar')
        @include('admindashboardlayout.sidebar')

        <!--begin::App Main-->
        <main class="app-main">

            <!--begin::App Content Header-->
            <div class="app-content-header">
                <div class="container-fluid">
                    <h3 class="mb-0">My Profile</h3>
                </div>
            </div>
            <!--end::App Content Header-->

            <!--begin::App Content-->
            <div class="app-content">
                <div class="container-fluid">

                    <div class="row">

                        <!-- Profile Card -->
                        <div class="col-md-4">
                            <div class="card shadow-sm">

                                <div class="card-body text-center">

                                    <img src="{{ $user->profile?->photo ? asset('storage/' . $user->profile->photo) : asset('assets/img/user2-160x160.jpg') }}"
                                        class="rounded-circle mb-3" width="120" height="120">

                                    <h5>{{ Auth::user()->name }}</h5>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>

                                    <!-- User Role -->
                                    <span class="badge bg-primary">
                                        {{ Auth::user()->getRoleNames()->join(', ') }}
                                    </span>

                                </div>
                            </div>
                        </div>

                        <!-- Profile Info -->
                        <div class="col-md-8">
                            <div class="card shadow-sm">

                                <div class="card-header">
                                    <h5 class="mb-0">Profile Information</h5>
                                </div>

                                <div class="card-body">

                                    <table class="table table-bordered">

                                        <tr>
                                            <th width="30%">Phone</th>
                                            <td>{{ $user->profile->phone ?? 'N/A' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $user->profile->address ?? 'N/A' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Document</th>
                                            <td>
                                                <a href="{{ $user->profile?->document ? asset('storage/'. $user->profile->document) : '#' }}"
                                                    target="_blank">
                                                    View File
                                                </a>
                                            </td>
                                        </tr>

                                    </table>

                                    <div class="mt-3">
                                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                                            Edit Profile
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!--end::App Content-->

        </main>
        <!--end::App Main-->

        @include('admindashboardlayout.footer')

    </div>

    @include('admindashboardlayout.script')
</body>
