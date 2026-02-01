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
                                        <h3 class="card-title flex-grow-1">Permissions List</h3>
                                        <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-plus-circle"></i> Permission Create
                                        </a>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">SL</th>
                                                    <th style="width: 100%">Permission Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($permissions as $permission)
                                                    <tr class="align-middle">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $permission->name }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-primary dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Actions
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('permissions.show', $permission->id) }}"><i
                                                                                class="bi bi-eye"></i> View</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('permissions.edit', $permission->id) }}"><i
                                                                                class="bi bi-pencil"></i> Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <form
                                                                            action="{{ route('permissions.destroy', $permission->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <a class="dropdown-item" href="#"
                                                                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this?')) {this.closest('form').submit();}"><i
                                                                                    class="bi bi-trash"></i> Delete</a>
                                                                        </form>
                                                                    </li>
                                                                    <li>
                                                                        <hr class="dropdown-divider" />
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="#">Separated
                                                                            link</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
