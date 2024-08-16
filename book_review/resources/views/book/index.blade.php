<x:layout>
    
    
    <h1 class="text-3xl font-bold my-5">Books</h1>
    <form action="{{route('book.index')}}" method="get" class="flex items-center space-x-3 mb-5">
        @csrf
        <input type="text" name="title" class="input" value="{{request()->input('title')}}" placeholder="Search by title">
        <button class="btn" type="submit">Filter</button>
        <a href="{{route('book.index')}}" class="btn">Clear</a>
    </form>

    <?php 
    $filters = [
        '' => 'Latest',
        'popular_last_month' => 'Popular Last Month',
        'popular_last_6months' => 'Popular Last 6 Months',
        'highestRated_last_month' => 'Highest Rated Last Month',
        'highestRated_last_6months' => 'Highest Rated Last 6 Months'
    ]
    ?>
    <div class="flex gap-3 items-center border my-5 rounded bg-gray-100 justify-between p-2">
        @foreach ($filters as $key => $label)
            <a href="{{route('book.index', [...request()->query(), 'filter' => $key])}}" class=" flex text-center h-20 px-2 items-center justify-center   w-40 hover:bg-white rounded font-semibold text-blue-400">{{$label}}</a>
        @endforeach
    </div>

    <div>
        @forelse ($books as $book)
            <div class="flex justify-between border rounded p-5 mb-3 bg-gray-100">
                <div>
                    <a href="{{route('book.show', ['book' => $book->id])}}" class="font-semibold text-xl">{{$book->title}}</a>
                    <p>{{$book->author}}</p>
                </div>
                <div>
                    <div>{{$book->reviews_avg_rating}}</div>
                    <div> <x:star-rating :rating="(int)$book->reviews_avg_rating"/></div>
                    <div>Out of {{$book->reviews_count}} {{Str::plural('review', $book->reviews_count)}}</div>
                </div>
            </div>
        @empty
            <div class="border border-blue-200 rounded p-5 mx-auto mt-5 text-center w-60">
                <h2>Books not Found</h2> 
                <a href="{{route('book.index')}}" class="text-blue-400 underline">Go Back</a>
            </div>
        @endforelse
    </div>
</x:layout>