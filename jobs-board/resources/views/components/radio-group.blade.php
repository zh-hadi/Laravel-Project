@props(['name', 'options' => [], 'default_option' => 'true', 'value' => null])

<div class="space-y-2">
    @if($default_option)
    <label for="{{$name}}" class="flex items-center space-x-2">
        <input type="radio" name="{{$name}}" id="" value="" @checked(!request($name))>
        <span>All</span>
    </label>
    @endif

    @foreach ($options as $option)
        <label for="{{ $name }}" class="flex items-center space-x-2">
            <input type="radio" name="{{$name}}" id="" value="{{$option}}"  @checked($option ===  ($value ?? request($name)))/>
            <span>{{ ucfirst($option)}}</span>
        </label>
    @endforeach
</div>