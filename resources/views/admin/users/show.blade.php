    @include('admindashboardlayout.header')

    <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
        <!--begin::App Wrapper-->
        <div class="app-wrapper">

            @include('admindashboardlayout.menubar')

            @include('admindashboardlayout.sidebar')

            <!--begin::App Main-->
            <main class="app-main">
                <!--begin::App Content Header-->
                <div class="app-content-header">
                    <!--begin::Container-->
                    <div class="container-fluid">
                    </div>
                    <!--end::Container-->
                </div>
                <div class="app-content">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="card-title flex-grow-1">User View</h3>
                                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-arrow-left-circle"></i> Back to User List
                                        </a>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">SL</th>
                                                    <th style="width: 20%">User Name</th>
                                                    <th style="width: 20%">User Email</th>
                                                    <th style="width: 60%">Role Name</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr class="align-middle">
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @foreach ($user->roles as $role)
                                                            <span class="badge text-bg-info">
                                                                {{ $role->name }}
                                                            </span>
                                                        @endforeach
                                                    </td>

                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">
                                        <ul class="pagination pagination-sm m-0 float-end">
                                            <li class="page-item">
                                                <a class="page-link" href="#">&laquo;</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">&raquo;</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.card -->


                                <!-- /.card -->
                            </div>

                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::App Content-->
            </main>
            <!--end::App Main-->
            @include('admindashboardlayout.footer')
        </div>
        <!--end::App Wrapper-->
        @include('admindashboardlayout.script')
    </body>
