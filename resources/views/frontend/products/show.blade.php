<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }} | MyShop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
        }

        .product-image {
            width: 100%;
            height: 350px;
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

    <!-- 🔹 Product Details -->
    <div class="container my-5">
        <div class="row g-5">

            <!-- Image -->
            <div class="col-md-6">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="product-image rounded shadow">
                @else
                    <img src="https://via.placeholder.com/500x350" class="product-image rounded shadow">
                @endif
            </div>

            <!-- Info -->
            <div class="col-md-6">
                <h3 class="fw-bold">{{ $product->name }}</h3>
                <p class="text-muted">Category: {{ $product->category->name }}</p>

                <h4 class="text-success fw-bold mb-3">
                    ৳ {{ $product->price }}
                </h4>

                <p>
                    {{ $product->description ?? 'No description available.' }}
                </p>

                <div class="d-flex gap-2 mt-4">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-primary px-4">
                            Add to Cart
                        </button>
                    </form>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                        Back
                    </a>
                </div>
            </div>
        </div>

        <!-- 🔹 Related Products -->
        @if ($relatedProducts->count())
            <div class="mt-5">
                <h5 class="fw-bold mb-4">Related Products</h5>

                <div class="row g-4">
                    @foreach ($relatedProducts as $item)
                        <div class="col-md-3">
                            <div class="card h-100 shadow-sm">
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top"
                                        style="height:180px;object-fit:cover;">
                                @else
                                    <img src="https://via.placeholder.com/300x180" class="card-img-top">
                                @endif

                                <div class="card-body">
                                    <h6>{{ $item->name }}</h6>
                                    <p class="fw-bold">৳ {{ $item->price }}</p>
                                </div>

                                <div class="card-footer bg-white border-0">
                                    <a href="{{ route('product.show', $item->id) }}"
                                        class="btn btn-sm btn-outline-primary w-100">
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>



</body>

</html>
