@props(['href' => '#'])
<a href="{{$href}}" {{ $attributes->class("px-2.5 py-1.5 border border-slate-300 rounded text-sm font-semibold ") }}>
    {{$slot}}
</a>