@props([
    'placeholder' => null, 
    'name' => null, 
    'value' => null,
    'type' => 'text',
    'ref' => false,
])


<div class="relative">
@if($type != 'textarea')
            @if($ref)
            <button type="button" class="absolute top-0 right-0 pr-2 h-full"
            onclick="document.getElementById('{{$name}}').value=''; document.getElementById('formSubmit').submit();">
                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
            @endif
    <input type="{{$type}}" 
        @class([
            'border-0 ring-1 rounded text-sm px-2.5 py-1.5 focus:ring-2 text-slate-500 placeholder:text-slate-400 w-full pr-8',
            'ring-slate-300' => !$errors->has($name),
            'ring-red-300' => $errors->has($name)
            ])
        name="{{$name}}"
        value="{{old($name, $value)}}"
        placeholder="{{$placeholder}}"
        id ="{{ $name }}"
    >
    @else
    <textarea id="{{ $name }}" name="{{ $name }}" @class([
        'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2',
        'pr-8' => $ref,
        'ring-slate-300' => !$errors->has($name),
        'ring-red-300' => $errors->has($name),
    ])>{{ old($name, $value) }}</textarea>
    @endif
    @error($name)
    <div class="text-sm text-red-400 font-semibold">
        {{$message}}
    </div>
    @enderror
</div>