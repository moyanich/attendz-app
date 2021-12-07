@section('title', 'User Profile')
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <div class="text-xs uppercase font-light text-gray-500">
                {{ __('Management') }}
            </div>
            <div class="text-xl font-bold">
                {{ __('User Profile') }}
            </div>
            <div class="breadcrumb">
                <x-breadcrumbs></x-breadcrumbs> 
            </div>
        </div>
    </x-slot>

    {{-- Messages --}}
    <x-messages />
    {{-- End Messages --}}

    {{-- Content --}}
    <div class="flex flex-col min-w-0 break-words bg-white mt-8 w-full md:w-8/12 mx-auto mb-6 shadow-xl rounded-lg">
        <div class="px-6">
            <div class="flex flex-wrap">
                <div class="w-full px-4 py-10">
                    <h6 class="text-blueGray-400 text-md mt-3 mb-6 font-bold uppercase">User Information</h6>
                    <p class="block text-blueGray-600 text-sm mb-2"> 
                        <span class="font-bold">{{ __('Name: ') }}</span>{{ $user->firstname . ' ' .  $user->lastname }} 
                    </p>

                    <p class="block text-blueGray-600 text-sm mb-2"> 
                        <span class="font-bold">{{ __('Email: ') }}</span>{{ $user->email }} 
                    </p>
                    <div class="font-bold text-red-700">
                        <p class="block text-blueGray-600 text-sm font-bold mb-2"> 
                            {{ __('Roles:') }}
                            @if(!empty($user->roles))
                                @foreach($user->roles as $user_has_roles)
                                    <span class="inline-block rounded text-white bg-blue-400 px-2 py-1 text-sm font-bold mr-1">{{ $user_has_roles->name }}</span>
                                @endforeach
                            @endif
                        </p>
                    </div>
                </div>
            </div>
       </div>
     </div>

    {{-- End Content --}}
</x-app-layout>



