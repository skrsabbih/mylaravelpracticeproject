<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body style="background:#f5f6f8;">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand fw-bold">MyShop</a>
            <a href="{{ route('cart.index') }}" class="btn btn-outline-light">
                Cart({{ count(session('cart', [])) }})
            </a>
        </div>
    </nav>

    <div class="container my-5">

        <h4 class="fw-bold mb-4">Your Cart</h4>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (count($cart))
            <table class="table bg-white shadow-sm">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Product Image</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>


                    @php $grandTotal = 0; @endphp

                    @foreach ($cart as $item)
                        @php
                            $total = $item['price'] * $item['quantity'];
                            $grandTotal += $total;
                        @endphp
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>৳ {{ $item['price'] }}</td>
                            <td>
                                @if ($item['image'])
                                    <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : 'https://via.placeholder.com/300x180' }}"
                                        alt="" srcset="" width="40" height="40">
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">

                                    <form action="{{ route('cart.decrese', $item['id']) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-secondary">−</button>
                                    </form>

                                    <span class="fw-bold">{{ $item['quantity'] }}</span>

                                    <form action="{{ route('cart.increase', $item['id']) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-secondary">+</button>
                                    </form>

                                </div>

                            </td>
                            <td>৳ {{ $total }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="text-end fw-bold fs-5">
                Grand Total: ৳ {{ $grandTotal }}
            </div>

            <div class="text-end mt-3">
                <button class="btn btn-success px-4">
                    Checkout
                </button>
            </div>
        @else
            <div class="alert alert-info">
                Cart is empty
            </div>
        @endif

    </div>

</body>

</html>
