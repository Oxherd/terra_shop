<div class="addComment">
    <h3>Comments:</h3>
    
    @if(Auth::check())
    <form action="/comments" method="POST">
        {{ csrf_field() }}
        <input type="text" name="body" placeholder="Leave a comment here" required/>
        <input type="number" min="1" max="5" step="1" name="star" placeholder="Rate a star" required/>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="item_id" value="{{ $item->id }}">
        <button>Submit</button>
    </form>
    @endif
    
                        
    @foreach($item->comments as $comment)
            @include('partials.comment', ['comment'])
    @endforeach
</div>