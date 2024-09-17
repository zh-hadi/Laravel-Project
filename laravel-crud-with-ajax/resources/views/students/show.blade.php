<div>
    <div>
        <img class="w-[200px] h-[200px] " src="{{ asset('storage/'.$student->photo) }}" alt="">
    </div>
    <div>
        <h2><span class="font-bold">Name:</span> {{$student->name }}</h2>
        <h2><span class="font-bold">Email:</span> {{ $student->email }}</h2>
    </div>
</div>