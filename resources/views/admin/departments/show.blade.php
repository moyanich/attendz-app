@section('title', 'Department Profile')
<x-app-layout>
    <x-slot name="header">
        <div class="w-full mb-6 pt-3">
            <div class="flex flex-row items-center justify-between mb-4">
                <div class="flex flex-col">
                    <div class="text-xs uppercase font-light text-gray-500">
                        {{ __('Edit') }}
                    </div>
                    <div class="text-xl font-bold">
                        {{ __('Department') }}
                    </div>
                    <div class="breadcrumb">
                        <x-breadcrumbs></x-breadcrumbs> 
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    {{-- Messages --}}
    <div class="flex mt-8">
        <x-messages />
    </div>
    {{-- End Messages --}}

    {{-- Content --}}
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full md:w-8/12 mx-auto px-6 py-10 mb-6 shadow-lg rounded">
        <div class="flex justify-end mb-3">
            <button class="flex items-center bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('department-modal')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>
        
        <div class="block w-full overflow-x-auto px-6">

           {!! Form::open(['action' => ['App\Http\Controllers\Admin\DepartmentsController@update', $department->id], 'method' => 'POST']) !!}

                <div class="flex flex-wrap">
                    <div class="w-full px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('name', 'Department Name', ['class' => 'block text-sm font-bold capitalize text-blueGray-600 mb-2']) }}

                            {{ Form::text('name', $department->name, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
                           
                            @error('name')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('manager', 'Manager', ['class' => 'block text-sm font-bold capitalize text-blueGray-600 mb-2']) }}

                            {!! Form::select('manager', $employees, $department->manager_id, ['class' => 'js-department-select form-select block w-full mt-1 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => 'Select employee..']) !!}

                            @error('manager')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror

                        </div>
                    </div>

                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('supervisor', 'Supervisor', ['class' => 'block text-sm font-bold capitalize text-blueGray-600 mb-2']) }}

                            {!! Form::select('supervisor', $employees, $department->supervisor_id, ['class' => 'js-department-select form-select block w-full mt-1 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => 'Select employee..']) !!}

                            @error('supervisor')
                                <p class="text-xs text-red-600">{{$message}}</p>
                            @enderror
                            
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="w-full px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('description', 'Description', ['class' => 'block text-sm font-bold capitalize text-blueGray-600 mb-2']) }}

                            {{ Form::textarea('description', $department->description, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'rows' => '4']) }}

                            @error('description')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="w-full flex justify-end">
                    <div class="px-4 py-5">

                        <a href="{{ route('admin.departments.index') }}" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            {{ __('Cancel') }}
                        </a>

                        {{ Form::submit('Save', ['class' => 'mt-3 w-full inline-flex justify-center shadow-sm btn btn-md btn-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cursor-pointer transition duration-500 ease-in-out hover:bg-blue-600 transform hover:-translate-y-1 hover:scale-110']) }}

                    </div>
                </div>

                {{Form::hidden('_method', 'PUT') }}
            {!! Form::close() !!}

        </div>
    </div>
    {{-- End Content --}}

</x-app-layout>




{{-- Delete Modal --}}
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="department-modal">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Delete record
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Are you sure you want to delete the record for <strong>{{ $department->name }}</strong>? All of your data will be permanently removed. This action cannot be undone.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                <!-- Form -->
                {!! Form::open(['action' => ['App\Http\Controllers\Admin\DepartmentsController@destroy', $department->id], 'method' => 'POST']) !!}

                {{ Form::submit('Delete', ['class' => 'w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm']) }}

                {{Form::hidden('_method', 'DELETE') }}
                {!! Form::close() !!}
              
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleModal('department-modal')">
                    {{ __('Cancel') }}
                </button>
            </div>
        </div>
    </div>
</div>
