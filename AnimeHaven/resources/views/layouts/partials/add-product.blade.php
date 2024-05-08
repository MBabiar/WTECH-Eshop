@if (Auth::user() && Auth::user()->isAdmin())
    <a href="{{ route('product.create') }}" class="floating-button">Add Product</a>
@endif
