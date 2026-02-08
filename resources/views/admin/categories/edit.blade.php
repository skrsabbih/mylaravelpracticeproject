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
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline mb-4">
                            <!-- Card Header -->
                            <div class="card-header d-flex align-items-center">
                                <div class="card-title flex-grow-1">Update Category</div>
                                <div>
                                    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-arrow-left-circle"></i> Back to Category List
                                    </a>
                                </div>
                            </div>

                            <!-- Display Validation Errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger m-3">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Student Create Form -->
                            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $category->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                </div>
                            </form>
                            <!-- End Form -->
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
