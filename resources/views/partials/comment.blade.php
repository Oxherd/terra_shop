<hr>
<div class="comment">
    <h4>{{ $comment->user->name }} say:</h4>
    <span>
        @for ($i = 1; $i <= 5; $i++)
            @if($comment->star >= $i)
            <i class="fas fa-star"></i>
            @else
            <i class="far fa-star"></i>
            @endif
        @endfor
    </span>
    <p>{{ $comment->body }}</p>
</div>