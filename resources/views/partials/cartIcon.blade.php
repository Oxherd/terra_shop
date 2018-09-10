<a href="/carts">
    <div class="cartIcon">
        <span>{{ $cart = session()->has('cart') ? count(session()->get('cart')) : "0" }}</span>
        <i class="fas fa-shopping-cart"></i>
    </div>
</a>