@if(Auth::check() && Auth::user()->is_admin)
    <div class="updateItem navigationForm">
        <h3>
            Update Item:
        </h3>
        
            <form class="update" action="/items/{{ $item->name }}" method="POST">
                {{ csrf_field() }}{{ method_field('put') }}
                <input type="text" name="picture" placeholder="Picture URL" value="{{ $item->picture }}" required/>
                <input type="text" name="name" placeholder="Item Name" value="{{ $item->name }}" required/>
                <input type="number" name="price" placeholder="Price" value="{{ $item->price }}" required>
                <textarea name="description" placeholder="Description">{{ $item->description }}</textarea>
                <!--<input type="hidden" value="{{ !empty($category) ? $category->classifications->first()->id : $classification->id }}" name="classification_id">-->
                <button type="submit">Update</button>
            </form>
            
    </div>
@endif