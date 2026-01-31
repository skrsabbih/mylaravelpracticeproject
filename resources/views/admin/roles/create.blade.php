@include('admindashboardlayout.header')

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">

        @include('admindashboardlayout.menubar')
        @include('admindashboardlayout.sidebar')

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="col-md-12">

                        <div class="card card-primary card-outline mb-4">
                            <!-- Header -->
                            <div class="card-header d-flex align-items-center">
                                <div class="card-title flex-grow-1">Create Role</div>
                                <div>
                                    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-arrow-left-circle"></i> Back to Role List
                                    </a>
                                </div>
                            </div>

                            <!-- Error -->
                            @if ($errors->any())
                                <div class="alert alert-danger m-3">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Form -->
                            <form action="{{ route('roles.store') }}" method="POST">
                                @csrf

                                <div class="card-body">

                                    <!-- Role Name -->
                                    <div class="mb-3">
                                        <label class="form-label">Role Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Permissions -->
                                    <div class="mb-3">
                                        <label class="form-label d-flex align-items-center justify-content-between">
                                            <span>Permissions</span>
                                            <div>
                                                <input type="checkbox" id="selectAll">
                                                <label for="selectAll" class="ms-1">Select All</label>
                                            </div>
                                        </label>

                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                <div class="col-md-3 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input permission-checkbox"
                                                            type="checkbox" name="permissions[]"
                                                            value="{{ $permission->name }}"
                                                            id="permission_{{ $permission->id }}"
                                                            {{ in_array($permission->name, old('permissions', [])) ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="permission_{{ $permission->id }}">
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                                <!-- Footer -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">
                                        Create Role
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </main>

        @include('admindashboardlayout.footer')
    </div>

    @include('admindashboardlayout.script')

    <!-- Select All Script -->
    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            document.querySelectorAll('.permission-checkbox').forEach(cb => {
                cb.checked = this.checked;
            });
        });
    </script>
</body>
