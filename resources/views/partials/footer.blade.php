<nav>
    <a href="{{ route('home') }}">{{ $settings['site_name'] ?? 'App' }}</a> |
    <a href="{{ route('posts.index') }}">Posts</a> |
    <a href="{{ route('products.index') }}">Products</a>
    <a href="{{ route('orders.index') }}">Orders</a>

</nav>
