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

                    <div class="col-md-12">
                        <div class="card card-primary card-outline mb-4">

                            <!-- Card Header -->
                            <div class="card-header d-flex align-items-center">
                                <div class="card-title flex-grow-1">Student Details</div>
                                <div>
                                    <a href="{{ route('students.index') }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-arrow-left-circle"></i> Back to Student List
                                    </a>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body">

                                <div class="row">

                                    <!-- Student Photo -->
                                    <div class="col-md-4 text-center mb-3">
                                        <img src="{{ $student?->photo ? asset('storage/' . $student->photo) : asset('assets/img/user2-160x160.jpg') }}"
                                            class="img-fluid rounded border" alt="Student Photo">
                                    </div>

                                    <!-- Student Info -->
                                    <div class="col-md-8">

                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="30%">Name</th>
                                                <td>{{ $student->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $student->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td>{{ $student->phone ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{ $student->address ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Document</th>
                                                <td>
                                                    <a href="{{ $student?->document ? asset('storage/' . $student->document) : '#' }}"
                                                        class="btn btn-sm btn-outline-primary" target="_blank">
                                                        View Document
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid"></div>
            </div>

        </main>

        @include('admindashboardlayout.footer')
    </div>

    @include('admindashboardlayout.script')
</body>
