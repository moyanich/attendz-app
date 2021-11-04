<x-app-layout>
    <x-slot name="header">
        <div class="w-full mb-6 pt-3">
            <div class="flex flex-row items-center justify-between mb-4">
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
            </div>
        </div>
    </x-slot>

    {{-- Messages --}}
    <div class="flex mt-8"><x-messages /></div>
    {{-- End Messages --}}

    {{-- Content --}}
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mx-auto px-6 py-10 mb-6 shadow-lg rounded">
        <div class="block w-full overflow-x-auto px-6">

            

            <div class="flex flex-wrap">
                <div class="w-full lg:w-2/12 px-4">
                    <div class="relative w-full mb-3">
                        {{ Form::label('empID', 'Employee ID', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                        {{ Form::text('empID', '', ['class' => 'uppercase border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => 'Employee ID']) }}

                        @error('empID')
                            <p class="text-xs text-red-600">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="w-full lg:w-3/12 px-4">
                    <div class="relative w-full mb-3">
                        {{Form::label('first_name', 'First Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2'])}}
                        {{Form::text('first_name', '', ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => 'First Name'])}}

                        @error('first_name')
                            <p class="text-xs text-red-600">{{$message}}</p>
                        @enderror

                    </div>
                </div>
                <div class="w-full lg:w-3/12 px-4">
                    <div class="relative w-full mb-3">
                        {{Form::label('middle_name', 'Middle Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2'])}}
                        {{Form::text('middle_name', '', ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => 'Middle Name'])}}
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4">
                    <div class="relative w-full mb-3">
                        {{Form::label('last_name', 'Last Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2'])}}
                        {{Form::text('last_name', '', ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => 'Last Name'])}}

                        @error('last_name')
                            <p class="text-xs text-red-600">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <hr class="my-8 border-b-1 border-blueGray-300">
            
            <div class="flex flex-wrap">
                <div class="w-full lg:w-4/12 px-4">
                    <div class="relative w-full mb-3">
                        {{ Form::label('gender', 'Gender', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2'])}}

                       {{--  {!! Form::select('gender', $genders, null, ['class' => 'form-select block w-full mt-1 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) !!}
                       
                       --}} 

                        @error('gender')
                            <p class="text-xs text-red-600">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4">
                    <div class="relative w-full mb-3">
                        {{Form::label('dob', 'Date of Birth', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2'])}}
                        {{Form::date('dob', '', ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => ''])}}

                        @error('dob')
                            <p class="text-xs text-red-600">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4">
                    <div class="relative w-full mb-3">
                        {{Form::label('hire_date', 'Hire Date', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2'])}}
                        {{Form::date('hire_date', 'Hire Date', ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150'])}}
                    </div>
                </div>
            </div>



            <div class="w-full flex justify-end">
                <div class="px-4 py-5">

                    <a href="{{ route('admin.employees.index') }}" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        {{ __('Cancel') }}
                    </a>

                    {{ Form::submit('Save', ['class' => 'mt-3 w-full inline-flex text-base font-medium text-white justify-center rounded-md shadow-sm px-6 py-2 border border-blue-600 bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cursor-pointer transition ease-in-out duration-150']) }}

                </div>
            </div>

        </div>
    </div>
    {{-- End Content --}}

</x-app-layout>
