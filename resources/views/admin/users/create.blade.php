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
                                <div class="card-title flex-grow-1">Create User</div>
                                <div>
                                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-arrow-left-circle"></i> Back to User List
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
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf

                                <div class="card-body">

                                    <!-- User Name -->
                                    <div class="mb-3">
                                        <label class="form-label">User Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- User Email -->
                                    <div class="mb-3">
                                        <label class="form-label">User Email</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- User Password -->
                                    <div class="mb-3">
                                        <label class="form-label">User Password</label>
                                        <input type="password" name="password" value="{{ old('password') }}"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Select Roles -->
                                    <div class="mb-3">
                                        <label class="form-label">Select Roles</label>
                                        <div class="from-group">
                                            <select name="roles[]" class="form-control select2" multiple>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}"
                                                        {{ in_array($role->name, old('roles', [])) ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">
                                        Create User
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

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Single or Multiple Select Roles",
                allowClear: true,
                width: '100%'
            });
        });
    </script>


</body>
