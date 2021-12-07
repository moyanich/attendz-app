@section('title', 'Edit File')

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <div class="text-xs uppercase font-light text-gray-500">
                {{ __('Edit File') }}
            </div>
            <div class="text-xl font-bold">
                {{ $file->filename ?? '' }}
            </div>
            <div class="breadcrumb">
                <x-breadcrumbs></x-breadcrumbs> 
            </div>
        </div>
    </x-slot>

    <div class="flex"><x-messages /></div>

    {{-- Content --}}
    <div class="flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg">
        <div class="px-6">
           <div class="flex flex-wrap">
              <div class="w-full px-4 py-10">
                 
                {!! Form::model($files, ['method' => 'PATCH', 'route' => ['admin.roles.update', $file->id]]) !!}
                @csrf
                {{-- 
                    {!! Form::open(['action' => ['App\Http\Controllers\Admin\EmployeesController@editfile', $file->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @csrf
                         --}}
                    <div class="flex flex-wrap">
                        <div class="relative w-full md:w-2/12 mb-3 px-4">
                            {{ Form::label('filename', 'Document Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            {{ Form::text('filename', $file->filename, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}

                            @error('filename')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="relative w-full mb-3 px-4">
                            {{ Form::label('file', 'Update Document', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                            <input type="file" name="file" class="border-0 px-3 py-3 text-blueGray-600 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip">

                            @error('file')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full flex justify-end">
                        <div class="px-4 py-5">
                            {{ Form::submit('Update', ['class' => 'mt-3 w-full inline-flex justify-center rounded-md border border-blue-600 shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-1 mb-1 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cursor-pointer']) }}
                        </div>
                    </div>

                {!! Form::close() !!}
            
              </div>
           </div>
        </div>
    </div>
    {{-- End Content --}}

</x-app-layout>
