@section('title', 'Jobs')
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <div class="text-xs uppercase font-light text-gray-500">
                {{ __('Manage') }}
            </div>
            <div class="text-xl font-bold">
                {{ __('Departments') }}
            </div>
            <div class="breadcrumb">
                <x-breadcrumbs></x-breadcrumbs> 
            </div>
        </div>
        <div class="flex-shrink-0 space-x-2">
            <a href="{{ route('admin.jobs.create') }}" class="btn" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                {{ __('New Job') }}
            </a>
        </div>
    </x-slot>
  
    <x-messages />
   




</x-app-layout>
