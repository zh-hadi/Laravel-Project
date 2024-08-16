<x:layout>
    <div class="flex flex-col space-y-3 mb-5">
        <h2 class="font-bold text-2xl mb-2 text-slate-700 mt-5">{{$book->title}}</h2>
        <p class="text-slate-500 text-sm">by {{$book->author}}</p>
        <div>0.0 reviews{{$book->reviews_avg_rating}}</div>
    </div>
    <div>
        <h2 class="text-2xl font-semibold text-slate-800 mb-3">Reviews</h2>
        @foreach ($book->reviews as $review)
        <div class="bg-gray-100 p-3 border border-slate-200 rounded mb-4">
            <div class="flex justify-between mb-2">
                <div>{{$review->rating}}.0</div>
                <div>{{$review->created_at}}</div>
            </div>
            <p>{{$review->review}}</p>
        </div>
        @endforeach
    </div>

</x:layout>