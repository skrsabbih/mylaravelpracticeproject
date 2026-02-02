<form action="" method="POST">

    <h3>Forgot Password</h3>
    <input type="email" name="email" placeholder="Enter your email" required>
    <button type="submit">Send Reset Link</button>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @error('email')
        <p>{{ $message }}</p>
    @enderror
</form>
