<div class="container topRating">
    @if(count($topRating) >= 3)
        <h2 class="title">Top Rating:</h2>
        @foreach($topRating as $comment)
        <a href="/items/{{ $comment->item->name }}">
        @include('partials.comment', ['comment'])
        </a>
        @endforeach
    @endif
</div>