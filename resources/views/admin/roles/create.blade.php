@section('title', 'New Role')
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <div class="text-xs uppercase font-light text-gray-500">
                {{ __('Create') }}
            </div>
            <div class="text-xl font-bold">
                {{ __('New Role') }}
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
    <div class="flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg">
        <div class="px-6">
           <div class="flex flex-wrap">
                <div class="w-full px-4 py-10">

                    {!! Form::open(array('route' => 'admin.roles.store', 'method'=>'POST')) !!}

                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('name', 'Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150')) !!}

                                    @error('name')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="w-full flex justify-end">
                            <div class="px-4 py-5">
                                {{ Form::submit('Save', ['class' => 'cursor-pointer bg-lightBlue-500 text-white active:bg-lightBlue-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150']) }}
                            </div>
                        </div>
                        
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    {{-- End Content --}}
    
</x-app-layout>




