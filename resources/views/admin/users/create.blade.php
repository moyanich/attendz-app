@section('title', 'New User')
<x-app-layout>
    <x-slot name="header">
        <div class="w-full mb-6 pt-3">
            <div class="flex flex-row items-center justify-between mb-4">
                <div class="flex flex-col">
                    <div class="text-xs uppercase font-light text-gray-500">
                        {{ __('Create') }}
                    </div>
                    <div class="text-xl font-bold">
                        {{ __('New User') }}
                    </div>
                    <div class="breadcrumb">
                        <x-breadcrumbs></x-breadcrumbs> 
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    {{-- Messages --}}
    <x-messages />
    {{-- End Messages --}}

    {{-- Content --}}
    <div class="flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg">
        <div class="px-6">
           <div class="flex flex-wrap">
                <div class="w-full px-4 py-10">

                    {!! Form::open(array('route' => 'admin.users.store', 'method'=>'POST')) !!}

                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('firstname', 'First Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                                    {!! Form::text('firstname', null, array('placeholder' => 'First Name','class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                                    @error('firstname')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('lastname', 'Last Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                                    {!! Form::text('lastname', null, array('placeholder' => 'Last Name','class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                                    @error('lastname')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
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


                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('roles', 'Roles', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                                @foreach($roles as $role)
                                    {!! Form::checkbox('roles[]', $role->id, false, array('class' => 'name ')) !!}
                                    {{ $role->name }}
                                    <br/>
                                @endforeach

                                @error('roles[]')
                                    <p class="text-xs text-red-600">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                        </div>

                        <div class="w-full flex justify-end">
                            <div class="px-4 py-5">
                                {{ Form::submit('Save', ['class' => 'mt-3 w-full inline-flex text-base font-medium text-white justify-center rounded-md shadow-sm px-6 py-2 border border-blue-600 bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cursor-pointer transition ease-in-out duration-150']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    {{-- End Content --}}
    
</x-app-layout>




