@props(['for' => '', 'required' => false])
<label for="{{$for}}" @class(['mb-2 block text-sm text-slate-900']);>
    {{$slot}} @if($required)<span>*</span>@endif
</label>