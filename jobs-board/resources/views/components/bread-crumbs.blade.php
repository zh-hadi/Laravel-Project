@props(['links' => []])

<nav class="mb-4">
        <ul class="flex items-center space-x-2.5 text-slate-500">
            <li>
                <a href="/">Home</a>
            </li>
            
            @foreach ($links as $label => $link)
                <li class="text-xl font-bold">→</li>
                <li>
                    <a href="{{$link}}">{{$label }}</a>
                </li>
            @endforeach
            
        </ul>
</nav> 