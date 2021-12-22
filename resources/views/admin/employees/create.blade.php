@section('title', 'New Employee')
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <div class="text-xs uppercase font-light text-gray-500">
                {{ __('New') }}
            </div>
            <div class="text-xl font-bold">
                {{ __('Employee') }}
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
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mx-auto px-6 py-10 mb-6 shadow-lg rounded">
        <div class="block w-full overflow-x-auto px-6">

            {!! Form::open(['action' => 'App\Http\Controllers\Admin\EmployeesController@store', 'method' => 'POST']) !!}

                <div class="flex flex-wrap">
                    <div class="w-full px-4 text-blueGray-400 text-sm mb-6 font-bold uppercase">
                        {{ __('Employee Information') }}
                    </div>
                    
                    <div class="w-full lg:w-2/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('id', 'Employee ID', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {{ Form::number('id', '', ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => '']) }}

                            @error('id')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
               
                    <div class="w-full lg:w-5/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('firstname', 'First Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {{Form::text('firstname', '', ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => 'First Name'])}}

                            @error('firstname')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="w-full lg:w-5/12 px-4">
                        <div class="relative w-full mb-3">
                            {{Form::label('lastname', 'Last Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2'])}}
                            {{Form::text('lastname', '', ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => 'Last Name'])}}

                            @error('lastname')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full lg:w-3/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('gender', 'Gender', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::select('gender', $genders, '', ['class' => 'form-select block w-full mt-1 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) !!}

                            @error('gender')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>


                

                
                <hr class="my-8 border-b-1 border-blueGray-300">
                
                <div class="flex flex-wrap">
                    <div class="w-full px-4 text-blueGray-400 text-sm mb-6 font-bold uppercase">
                        {{ __('User Login Information') }}
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('username', 'Username', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                            @error('username')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('email', 'Email Address', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                            @error('email')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('password', 'Password', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                            @error('password')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('confirm-password', 'Confirm Password', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                            @error('confirm-password')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        {!! Form::hidden('role', $role->id, array('class' => 'name', 'default')) !!}
                    </div>
                </div>
        
                <div class="w-full flex justify-end">
                    <div class="px-4 py-5">
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-outline">
                            {{ __('Cancel') }}
                        </a>

                        {{ Form::submit('Save', ['class' => 'btn btn-secondary']) }}
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
    {{-- End Content --}}


</x-app-layout>
