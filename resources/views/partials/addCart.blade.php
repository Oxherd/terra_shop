<form class="addCart" action="/carts" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="name" value="{{ $item->name }}" />
    <input type="hidden" name="price" value="{{ $item->price }}" />
    <input type="number" name="quantity" value="1" min="1" step="1" required/>
    
    <button><i class="fas fa-shopping-cart"></i></button>
</form>