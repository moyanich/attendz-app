@section('title', 'Edit User')

<x-app-layout>
    <x-slot name="header">
        <div class="w-full mb-6 pt-3">
            <div class="flex flex-row items-center justify-between mb-4">
                <div class="flex flex-col">
                    <div class="breadcrumb">
                        <x-breadcrumbs></x-breadcrumbs> 
                    </div>
                    <div class="text-xs uppercase font-light text-gray-500">
                        {{ __('Edit') }}
                    </div>
                    <div class="text-xl font-bold">
                        {{ __('User: ') . $user->name }}
                    </div>
                    
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
            <div class="bg-white py-8 px-4 shadow-md overflow-x-auto whitespace-no-wrap align-middle inline-block min-w-full overflow-hidden border border-gray-200">

                {!! Form::model($user, ['method' => 'PATCH', 'route' => ['admin.users.update', $user->id]]) !!}

                    <div class="flex flex-wrap">
                        <div class="relative w-full md:w-6/12 mb-3 px-4">
                            {{ Form::label('name', 'Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                            @error('name')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="relative w-full md:w-6/12 mb-3 px-4">
                            {{ Form::label('email', 'Email', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::email('email', null, array('placeholder' => 'Email', 'class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                            @error('email')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{--  Removed to prevent users from edit user password
                    <div class="flex flex-wrap">
                        <div class="relative w-full md:w-6/12 mb-3 px-4">
                            {{ Form::label('password', 'Password', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::password('password', array('placeholder' => 'Password', 'class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                            @error('password')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="relative w-full md:w-6/12 mb-3 px-4">
                            {{ Form::label('confirm-password', 'Confirm Password', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password', 'class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                            @error('confirm-password')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    --}}

                    <div class="flex flex-wrap">
                        <div class="relative w-full md:w-6/12 mb-3 px-4">
                            {{ Form::label('roles', 'Roles', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            @foreach($roles as $role)
                                {!! Form::checkbox('roles[]', $role->id, in_array($role->id, $user->roles->pluck('id')->toArray()) ? true : false, array('class' => 'name ')) !!}
                                {{ $role->name }}
                                <br/>
                            @endforeach
                            
                            @error('roles[]')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full flex justify-end">
                        <div class="px-4 py-5">
                            {{ Form::submit('Save', ['class' => 'px-10 py-2 uppercase text-sm bg-blue-600 text-white active:bg-blue-500 font-extrabold shadow hover:shadow-md hover:bg-blue-500 outline-none focus:outline-none focus:border-gray-900 cursor-pointer transition ease-in-out duration-150']) }}
                        </div>
                    </div>

                {!! Form::close() !!}
              
            </div>
        </div>
    </div>
    {{-- End Content --}}
</x-app-layout>
