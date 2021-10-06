<x-app-layout>
    <x-slot name="header">
        <div class="w-full mb-6 pt-3">
            <div class="flex flex-row items-center justify-between mb-4">
                <div class="flex flex-col">
                    <div class="text-xs uppercase font-light text-gray-500">
                        {{ __('Management') }}
                    </div>
                    <div class="text-xl font-bold">
                        {{ __('Users') }}
                    </div>
                    <div class="breadcrumb">
                      {{--   <x-breadcrumb></x-breadcrumb> --}} 
                    </div>
                </div>
                <div class="flex-shrink-0 space-x-2">
                    <a href="{{ route('admin.users.create') }}" class="flex items-center text-xs px-4 py-2 bg-blue-600 text-white hover:bg-blue-400 font-extrabold uppercase shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ __('Add New User') }}
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   users
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


{{-- 
    
    
    
<x-app-layout>
    
    <x-slot name="header">
        <div class="w-full mb-6 pt-3">
            <div class="flex flex-row items-center justify-between mb-4">
                <div class="flex flex-col">
                    <div class="text-xs uppercase font-light text-gray-500">
                        {{ __('Management') }}
                    </div>
                    <div class="text-xl font-bold">
                        {{ __('Users') }}
                    </div>
                    <div class="breadcrumb">
                        <x-breadcrumb></x-breadcrumb>
                    </div>
                </div>
                <div class="flex-shrink-0 space-x-2">
                    <a href="{{ route('users.create') }}" class="flex items-center text-xs px-4 py-2 bg-blue-600 text-white hover:bg-blue-400 font-extrabold uppercase shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ __('Add New User') }}
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="flex mt-8">
        <x-messages />
    </div>

    <div class="flex flex-col mt-4">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="rounded-md bg-white overflow-x-auto whitespace-no-wrap align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">

                <table class="table w-full cell-border hover order-column row-border nowrap min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                                {{ __('No') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                                {{ __('Name') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                                {{ __('Email') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                                {{ __('Roles') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($data as $key => $user)
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $roleName)
                                            <label class="badge badge-success">{{ $roleName }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="flex flex-wrap items-center p-4">
                                    <a href="{{ route('users.edit', $user->id) }}" class="flex items-center px-4 py-0.5 text-sm text-emerald-400 hover:text-emerald-100 bg-emerald-100 hover:bg-emerald-400 rounded-none border border-emerald-400 outline-none focus:outline-none mr-3 mb-1 ease-linear transition-all duration-150" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                        <span>{{ __('Edit') }}</span>
                                    </a>

                                    <a href="{{ route('users.show',$user->id) }}" class="flex items-center px-4 py-0.5 text-sm text-blue-400 hover:text-blue-100 bg-blue-100 hover:bg-blue-400 rounded-none border border-blue-400 outline-none focus:outline-none mr-3 mb-1 ease-linear transition-all duration-150" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg> 
                                        {{ __('View') }}
                                    </a>

                                    <button class="flex items-center px-4 py-0.5 text-sm text-red-400 hover:text-red-100 bg-red-100 hover:bg-red-400 rounded-none border border-red-400 outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('user-delete-{{ $user->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg> 
                                        {{ __('Delete') }}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                Pagination 
                <div class="p-5">
                    {!! $data->render() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    
    
--}}