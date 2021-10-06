<x-app-layout>
    <x-slot name="header">
        <div class="w-full pt-3">
            <div class="flex flex-row items-center justify-between">
                <div class="flex flex-col">
                    <div class="breadcrumb">
                        <x-breadcrumbs></x-breadcrumbs> 
                    </div>
                    <div class="text-xs uppercase font-light text-gray-500">
                        {{ __('Management') }}
                    </div>
                    <div class="text-xl font-bold">
                        {{ __('User') }}
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    {{-- Messages --}}
    <x-messages />
    {{-- End Messages --}}

    {{-- Content --}}
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">User Information</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <h6 class="font-bold text-sm mb-2">
                    {{ __('Name: ') . '' . $user->name }}
                </h6>

                <h6 class="font-bold text-sm mb-2">
                    {{ __('Email: ') . '' . $user->email }}
                </h6>
                <p class="text-red-700 leading-tight">
                    {{ __('Roles:') }}

                    {{--  @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <span class="inline-block rounded-min text-gray-600 bg-blue-200 px-2 py-1 text-xs font-bold mr-1">{{ $v }}</span>
                        @endforeach
                    @endif--}}
                </p>

            </div>
        </div>
    </div>
    {{-- End Content --}}
</x-app-layout>



