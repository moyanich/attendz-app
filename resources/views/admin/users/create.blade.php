<x-app-layout>
    <x-slot name="header">
        <div class="w-full mb-6 pt-3">
            <div class="flex flex-row items-center justify-between mb-4">
                <div class="flex flex-col">
                    <div class="breadcrumb">
                        <x-breadcrumbs></x-breadcrumbs> 
                    </div>
                    <div class="text-xs uppercase font-light text-gray-500">
                        {{ __('Create') }}
                    </div>
                    <div class="text-xl font-bold">
                        {{ __('New User') }}
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

    {{-- Separator --}}
    <div class="mt-8"></div>
    {{-- End Separator --}}

    {{-- Messages --}}
    <x-messages />
    {{-- End Messages --}}


    {{-- Content --}}
    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                
            </div>
        </div>
    </div>

    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="bg-white py-8 px-4 shadow-md overflow-x-auto whitespace-no-wrap align-middle inline-block min-w-full overflow-hidden border border-gray-200">

                {!! Form::open(array('route' => 'admin.users.store', 'method'=>'POST')) !!}
        
                    <div class="flex flex-wrap">
                        <div class="relative w-full md:w-6/12 mb-3 px-4">
                            {{ Form::label('name', 'Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                            @error('name')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="relative w-full md:w-6/12 mb-3 px-4">
                            {{ Form::label('email', 'Email Address', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                            @error('email')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap">
                        <div class="relative w-full md:w-6/12 mb-3 px-4">
                            {{ Form::label('password', 'Password', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                            @error('password')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="relative w-full md:w-6/12 mb-3 px-4">
                            {{ Form::label('confirm-password', 'Confirm Password', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                            @error('confirm-password')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap">
                        <div class="relative w-full md:w-6/12 mb-3 px-4">
                            {{ Form::label('roles', 'Role', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::select('roles[]', $roles, [], array('class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-15', 'multiple')) !!}

                            @error('roles[]')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="relative w-full md:w-6/12 mb-3 px-4">
                            
                        </div>
                    </div>

                    <div class="w-full flex justify-end">
                        <div class="px-4 py-5">
                            {{ Form::submit('Save', ['class' => 'px-8 py-2 uppercase text-sm bg-blue-600 text-white active:bg-blue-500 font-extrabold shadow hover:shadow-md hover:bg-blue-500 outline-none focus:outline-none focus:border-gray-900 cursor-pointer transition ease-in-out duration-150']) }}
                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
    {{-- End Content --}}
</x-app-layout>




