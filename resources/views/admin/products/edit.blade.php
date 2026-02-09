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
                                <div class="card-title flex-grow-1">Update Product</div>
                                <div>
                                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-arrow-left-circle"></i> Back to Product List
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
                            <form action="{{ route('products.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $product->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Product Category</label>
                                        <select name="category_id" class="form-control mb-2" required>
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="number" name="price" step="0.01"
                                            class="form-control @error('price') is-invalid @enderror"
                                            value="{{ old('price', $product->price) }}">
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Stock</label>
                                        <input type="number" name="stock"
                                            class="form-control @error('stock') is-invalid @enderror"
                                            value="{{ old('stock', $product->stock) }}">
                                        @error('stock')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Product Image</label>
                                        <input type="file" name="image"
                                            class="form-control @error('image') is-invalid @enderror">
                                        <img src="{{ $product?->image ? asset('storage/' . $product->image) : asset('assets/img/user2-160x160.jpg') }}"
                                            alt="" srcset="" width="100" height="100">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Product</button>
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
