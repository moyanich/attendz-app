@section('title', 'Employee Profile - ' . $employee->fullname . '')
<x-app-layout>
    <x-slot name="header">
        <div class="w-full mb-6 pt-3">
            <div class="flex flex-row items-center justify-between mb-4">
                <div class="flex flex-col">
                    <div class="text-xs uppercase font-light text-gray-500">
                        {{ __('Employee Profile') }}
                    </div>
                    <div class="text-xl font-bold">
                        {{ $employee->completename }}
                    </div>
                    <div class="breadcrumb">
                        <x-breadcrumbs></x-breadcrumbs> 
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="flex"><x-messages /></div>

    {{-- Content --}}
    <div class="emp-profile relative flex flex-col min-w-0 break-words bg-white w-full mx-auto px-6 py-10 mb-6 shadow-lg rounded">
        <div class="flex justify-end mb-3">
            <button class="flex items-center bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('department-modal')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>
        
        <div class="block w-full overflow-x-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-5 border border-black divide-y divide-gray-200 py-8 px-6">              
                <div class="flex items-start space-x-6 mb-4">
                    <img class="h-28 w-28 object-cover object-center rounded-full" 
                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
                    <div>
                        <p class="text-xl text-gray-800 font-bold mb-1">
                            {{ $employee->completename }}
                        </p>
                        <p class="flex text-sm text-gray-500 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            {{ $employee->phone_number }}</p>
                        <p class="flex text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <a class="" href="mailto:{{ $employee->email }}">{{ $employee->email }}</a>
                        </p>
                    </div>
                </div>                
                <div>
                    <table class="w-full border-collapse border border-gray-200">
                        <tbody>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap bg-gray-100 border border-gray-200">
                                    {{ __('Employee Number') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border border-gray-200">{{ $employee->id }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap bg-gray-100 border border-gray-200">
                                    {{ __('ID Number') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border border-gray-200">NUMBER HERE</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="w-full">
                {{-- TABS --}}
                <div x-data="{active: 0}">
                    <div class="flex border border-b-2 border-black overflow-hidden -mb-px">
                        <button class="px-4 py-2 w-full" x-on:click.prevent="active = 0" x-bind:class="{'bg-black text-white': active === 0}">
                            {{ __('Personal Information') }}
                        </button>
                        <button class="px-4 py-2 w-full" x-on:click.prevent="active = 1" x-bind:class="{'bg-black text-white': active === 1}">
                            {{ __('Job History') }}
                        </button>
                        <button class="px-4 py-2 w-full" x-on:click.prevent="active = 2" x-bind:class="{'bg-black text-white': active === 2}"> 
                            {{ __('Leave History') }}
                        </button>
                    </div>
                    <div class="border border-black -mt-px">
                        <div class="p-4 space-y-2" x-show="active === 0"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100">
                            
                            <div class="grid grid-cols-6 personal-info">
                                <div class="info-heading">
                                    {{ __('Date of Birth') }}
                                </div>
                                <div class="info-text">
                                    {{ $employee->date_of_birth }}
                                </div>
                                <div class="info-heading">
                                    {{ __('Gender') }}
                                </div>
                                <div class="info-text">
                                    {{ $employee->gender_id }}
                                </div>
                                <div class="info-heading">
                                    {{ __('Hire Date') }}
                                </div>
                                <div class="info-text">
                                    {{ $employee->hire_date }}
                                </div>
                                <div class="info-heading">
                                    {{ __('Marital Status') }}
                                </div>
                                <div class="info-text">
                                    {{ $employee->date_of_birth }}
                                </div>
                            </div>

                        </div>
                        <div class="p-4 space-y-2" x-show="active === 1"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100">
                            <h2 class="text-2xl">Panel 2 Using x-show.transition</h2>
                            <p>Panel 2 content</p>
                        </div>
                        <div class="p-4 space-y-2" x-show="active === 2"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100">
                            <h2 class="text-2xl">Panel 3 Using x-transition</h2>
                            <p>Panel 3 content</p>
                        </div>
                    </div>
                </div>
             


            </div>
        </div>
    </div>
    {{-- End Content --}}

</x-app-layout>


       
