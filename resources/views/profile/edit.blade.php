@include('admindashboardlayout.header')

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">

        @include('admindashboardlayout.menubar')
        @include('admindashboardlayout.sidebar')

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <h3 class="mb-0">Edit Profile</h3>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <!-- Left: Photo -->
                            <div class="col-md-4">
                                <div class="card shadow-sm text-center p-3">
                                    <img src="{{ $user->profile?->photo ? asset('storage/' . $user->profile->photo) : asset('assets/img/user2-160x160.jpg') }}"
                                        class="rounded-circle mb-3" width="120" height="120">
                                    <input type="file" name="photo" class="form-control">
                                    @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Right: Profile Form -->
                            <div class="col-md-8">
                                <div class="card shadow-sm p-3">

                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $user->name) }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $user->email) }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone', $user->profile->phone ?? '') }}">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control">{{ old('address', $user->profile->address ?? '') }}</textarea>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label>Document</label>
                                        <input type="file" name="document" class="form-control">
                                        @error('document')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <td>
                                            <a href="{{ $user->profile?->document ? asset('storage/' . $user->profile->document) : '#' }}"
                                                target="_blank">
                                                View File
                                            </a>
                                        </td>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Profile</button>

                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </main>

        @include('admindashboardlayout.footer')
    </div>

    @include('admindashboardlayout.script')
</body>
