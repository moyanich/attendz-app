@section('title', 'Edit Employee Document')

<x-app-layout>
    <x-slot name="header">
        <div class="w-full mb-6 pt-3">
            <div class="flex flex-row items-center justify-between mb-4">
                <div class="flex flex-col">
                    <div class="text-xs uppercase font-light text-gray-500">
                        {{ __('Update') }}
                    </div>
                    <div class="text-xl font-bold">
                        {{ __('File') }}
                    </div>
                </div>
                <div class="flex-shrink-0 space-x-2">
                    <a href="{{ route('admin.employees.create') }}" class="flex items-center bg-lightBlue-500 text-white active:bg-lightBlue-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ __('Create New') }}
                    </a>
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
    <div class="emp-profile relative flex flex-col min-w-0 break-words bg-white w-full mx-auto px-6 py-10 mb-6 shadow-lg rounded">
        {!! Form::open(['action' => ['App\Http\Controllers\Admin\EmployeesController@editfile', $files->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        @csrf
        <div class="flex-auto py-10 pt-0">
            <div class="flex flex-wrap">
                <div class="relative w-full mb-3">
                    {{ Form::label('filename', 'Document Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                    {{ Form::text('filename', $files->filename, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}

                    @error('filename')
                        <p class="text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="relative w-full mb-3">
                    {{ Form::label('file', 'Update Document', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                    <input type="file" name="file" class="border-0 px-3 py-3 text-blueGray-600 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip">

                    @error('file')
                        <p class="text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!--footer-->
        <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
            <a href="{{ }}" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-1 mb-1 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                {{ __('Cancel') }}
            </a>

            {{ Form::submit('Update', ['class' => 'mt-3 w-full inline-flex justify-center rounded-md border border-blue-600 shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-1 mb-1 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cursor-pointer']) }}
        </div>

    {{ Form::hidden('_method', 'PUT') }}
    {!! Form::close() !!}
    </div>
    {{-- End Content --}}

</x-app-layout>