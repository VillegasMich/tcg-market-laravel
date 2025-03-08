@props(['active' => false]) 
<a {{$attributes}} class="{{$active ? 'border-1 border-b border-indigo-600' : 'hover:border-0.5 hover:border-b hover:border-indigo-600'}} h-full flex justify-center items-center ">
    {{$slot}}
</a>

{{-- Las props se deben de pasar cuando sabemos que no son parte del HTML ni que deben incluirse en los attributes --}}
