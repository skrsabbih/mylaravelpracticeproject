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
                                <div class="card-title flex-grow-1">Product Details</div>
                                <div>
                                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-arrow-left-circle"></i> Back to Product List
                                    </a>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body">

                                <div class="row">

                                    <!-- Student Photo -->
                                    <div class="col-md-4 text-center mb-3">
                                        <img src="{{ $product?->image ? asset('storage/' . $product->image) : asset('assets/img/user2-160x160.jpg') }}"
                                            class="img-fluid rounded border" alt="Product Photo">
                                    </div>

                                    <!-- Student Info -->
                                    <div class="col-md-8">

                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="30%">Name</th>
                                                <td>{{ $product->name }}</td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Description</th>
                                                <td>{{ $product->description }}</td>
                                            </tr>
                                            <tr>
                                                <th>Product Category</th>
                                                <td>{{ $product->category->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Price</th>
                                                <td>{{ $product->price ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Stock</th>
                                                <td>{{ $product->stock ?? 'N/A' }}</td>
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
