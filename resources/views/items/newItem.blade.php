@if(Auth::check() && Auth::user()->is_admin)
    <div class="newItem navigationForm">
        <h3>
            New Item:
        </h3>
        
            <form class="create" action="/items" method="POST">
                {{ csrf_field() }}
                <input type="text" name="picture" placeholder="Picture URL" required/>
                <input type="text" name="name" placeholder="Item Name" required/>
                <input type="number" name="price" placeholder="Price" required>
                <textarea name="description" placeholder="Description"></textarea>
                <input type="hidden" value="{{ !empty($category) ? $category->classifications->first()->id : $classification->id }}" name="classification_id">
                <button type="submit">Add</button>
            </form>
            
    </div>
@endif