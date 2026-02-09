<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Shop</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
        }

        .category-link {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .category-link.active {
            color: #0d6efd;
            font-weight: bold;
        }

        .product-card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <!-- 🔹 Navbar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                MyShop
            </a>
        </div>
    </nav>

    <!-- 🔹 Category Menu -->
    <div class="bg-white shadow-sm">
        <div class="container py-3">
            <div class="d-flex gap-3 flex-wrap">
                <a href="{{ route('home') }}" class="category-link {{ !request('categoty') ? 'active' : '' }}">All
                    Products</a>
                @foreach ($categories as $category)
                    <a href="{{ route('home', ['category' => $category->id]) }}"
                        class="category-link {{ request('category') == $category->id ? 'active' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- 🔹 Products -->
    <div class="container my-5">
        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card product-card h-100 shadow-sm">

                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top">
                        @else
                            <img src="https://via.placeholder.com/300x200" class="card-img-top">
                        @endif

                        <div class="card-body">
                            <h6 class="card-title">{{ $product->name }}</h6>
                            <p class="text-muted small">{{ $product->category->name }}</p>
                            <h6 class="fw-bold">৳ {{ $product->price }}</h6>
                        </div>

                        <div class="card-footer bg-white border-0">
                            <a href="{{ route('product.show', $product->id) }}"
                                class="btn btn-outline-primary btn-sm w-100">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No products found.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $products->withQueryString()->links() }}
        </div>
    </div>



</body>

</html>
