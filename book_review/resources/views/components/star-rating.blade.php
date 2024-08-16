@if ($rating)
    @for ($i = 0; $i<5; $i++)
        {{$i < $rating ? '★' : '☆'}}
    @endfor
@else
    No Rating Yet
@endif