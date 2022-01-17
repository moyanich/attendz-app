@php
    $classes = 'px-2 flex text-sm leading-5 font-semibold bg-transparent rounded-full items-center';
@endphp

{{--  Refactored to use switch --}}
@switch($message)

    @case('active')
        <div {{ $attributes->merge(['class' => $classes . ' text-emerald-500']) }}>
            <span class="badge badge-primary px-2 py-1 text-xs font-bold mr-1">{{ $slot }}</span>
        </div>
        @break

    @case('inactive')
        <div {{ $attributes->merge(['class' => $classes . ' text-blueGray-800']) }}>
            <span class="badge badge-accent px-2 py-1 text-xs font-bold mr-1">{{ $slot }}</span>
        </div>
        @break
    
    @case('new')
        <div {{ $attributes->merge(['class' => $classes . ' text-blue-400']) }}>
            <span class="badge badge-secondary px-2 py-1 text-xs font-bold mr-1">{{ $slot }}</span>
        </div>
        @break

     @case('')
        @break
    
    @default
        <div {{ $attributes->merge(['class' => $classes . ' text-blueGray-800']) }}>
            <span class="badge px-2 py-1 text-xs font-bold mr-1">{{ $slot }}</span>
        </div>
        @break

@endswitch


{{--  
@if ($message == 'active')

    <div {{ $attributes->merge(['class' => $classes . ' text-emerald-500']) }}>
        <span class="badge badge-primary px-2 py-1 text-xs font-bold mr-1">{{ $slot }}</span>
    </div>

@elseif ($message == 'inactive')

    <div {{ $attributes->merge(['class' => $classes . ' text-blueGray-800']) }}>
        <span class="badge badge-accent px-2 py-1 text-xs font-bold mr-1">{{ $slot }}</span>
    </div>

@elseif ($message == 'new')

    <div {{ $attributes->merge(['class' => $classes . ' text-blue-400']) }}>
        <span class="badge badge-secondary px-2 py-1 text-xs font-bold mr-1">{{ $slot }}</span>
    </div>

@elseif ($message == '')

@else 

    <div {{ $attributes->merge(['class' => $classes . ' text-blueGray-800']) }}>
        <span class="badge px-2 py-1 text-xs font-bold mr-1">{{ $slot }}</span>
    </div>

@endif
--}}

