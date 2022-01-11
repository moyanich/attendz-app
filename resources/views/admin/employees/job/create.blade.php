@section('title', 'New Job')
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <div class="text-xs uppercase font-light text-gray-500">
                {{ __('New') }}
            </div>
            <div class="text-xl font-bold">
                {{ __('Employee Job Profile') }}
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
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mx-auto px-6 py-10 mb-6 card shadow">
        <div class="block w-full overflow-x-auto px-6">
            {!! Form::open(['action' => ['App\Http\Controllers\Admin\EmployeeJobHistoryController@store', $employee->id], 'method' => 'POST']) !!}
                {{ Form::hidden('employee_id', $employee->id) }}
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('job', 'Job Title', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::select('job', $jobs, '', ['class' => 'form-select block w-full mt-1 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) !!}

                            @error('job')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('department', 'Department', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::select('department', $departments, '', ['class' => 'form-select block w-full mt-1 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) !!}

                            @error('job')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('start', 'Start Date', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {{ Form::date('start', '', ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => '']) }}

                            @error('start')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('end', 'End Date', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {{ Form::date('end', '', ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => '']) }}

                            @error('end')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('contract', 'Contract Type', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::select('contract', $contracts, '', ['class' => 'form-select block w-full mt-1 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) !!}

                            @error('job')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full lg:w-3/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('notiifcation', 'Notification Period (Days)', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {{ Form::number('notiifcation', '', ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => '']) }} 

                            @error('notiifcation')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                </div>

                <div class="w-full flex justify-end px-4 py-5">
                    <a href="{{ route('admin.employees.show', $employee->id) }}" class="btn btn-outline mt-3 w-full inline-flex justify-center sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        {{ __('Cancel') }}
                    </a>

                    {{ Form::submit('Save', ['class' => 'btn btn-secondary mt-3 w-full inline-flex justify-center sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cursor-pointer']) }}
                </div>
                
            {!! Form::close() !!}
        </div>
    </div>
    {{-- End Content --}}

</x-app-layout>
