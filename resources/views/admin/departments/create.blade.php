<x-app-layout>
    <x-slot name="header">
        <div class="w-full mb-6 pt-3">
            <div class="flex flex-row items-center justify-between mb-4">
                <div class="flex flex-col">
                    <div class="text-xs uppercase font-light text-gray-500">
                        {{ __('Create new') }}
                    </div>
                    <div class="text-xl font-bold">
                        {{ __('Departments') }}
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
        <div class="block w-full overflow-x-auto px-6">

            <!-- CREATE DEPARTMENT -->
            {!! Form::open(['action' => 'App\Http\Controllers\Admin\DepartmentsController@store', 'method' => 'POST']) !!}
            
                <div class="flex flex-wrap">
                    <div class="w-full px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('name', 'Department Name', ['class' => 'block text-sm font-bold capitalize text-blueGray-600 mb-2']) }}

                            {{ Form::text('name', '', ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}

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

                        {{-- 
                            {!! Form::select('manager', $users, null, ['class' => 'form-select block w-full mt-1 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => 'Select employee..']) !!}  --}}

                            {!! Form::select('manager', $users, null, ['class' => 'js-department-select form-select block w-full mt-1 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => 'Select employee..']) !!}

                           {{--  <div class="col-md-6">
                                <select class="js-data-ajax" data-endpoint="departments" data-placeholder="{{ trans('general.select_department') }}" name="{{ $fieldname }}" style="width: 100%" id="department_select" aria-label="{{ $fieldname }}">
                                    @if ($department_id = old($fieldname, (isset($item)) ? $item->{$fieldname} : ''))
                                        <option value="{{ $department_id }}" selected="selected" role="option" aria-selected="true"  role="option">
                                            {{ (\App\Models\Department::find($department_id)) ? \App\Models\Department::find($department_id)->name : '' }}
                                        </option>
                                    @else
                                        <option value=""  role="option">{{ trans('general.select_department') }}</option>
                                    @endif
                                </select>
                            </div> --}}

                           


                            @error('manager')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror

                            {{--  
                            {{Form::label('manager', 'Manager', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2'])}}
                            {!! Form::select('manager', $employees, null, ['class' => 'form-select block w-full mt-1 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => 'Select employee..']) !!}
                            @error('manager')
                                <p class="text-xs text-red-600">{{$message}}</p>
                            @enderror--}}
                        </div>
                    </div>

                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            {{ Form::label('supervisor', 'Supervisor', ['class' => 'block text-sm font-bold capitalize text-blueGray-600 mb-2']) }}
                            {{--  
                          
                            {!! Form::select('supervisor', $employees, null, ['class' => 'form-select block w-full mt-1 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'placeholder' => 'Select employee..']) !!}
                            @error('supervisor')
                                <p class="text-xs text-red-600">{{$message}}</p>
                            @enderror--}}
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="w-full px-4">
                        <div class="relative w-full mb-3">
                            {{--  {{ Form::label('description', 'Description', ['class' => 'block text-sm font-bold capitalize text-blueGray-600 mb-2']) }}

                            {{ Form::textarea('description', '', ['class' => 'border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'rows' => '4']) }}

                            @error('description')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror --}}
                        </div>
                    </div>
                </div>

                <div class="w-full flex justify-end">
                    <div class="px-4 py-5">

                        <a href="{{ route('admin.departments.index') }}" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            {{ __('Cancel') }}
                        </a>

                        {{ Form::submit('Save', ['class' => 'mt-3 w-full inline-flex text-base font-medium text-white justify-center rounded-md shadow-sm px-6 py-2 border border-blue-600 bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cursor-pointer transition ease-in-out duration-150']) }}

                    </div>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
    
    {{-- End Content --}}


</x-app-layout>


{{-- 
    
    
     <div class="grid grid-cols-3 place-content-center py-4">

                    {{ Form::label('name', 'Department Name', ['class' => 'block capitalize text-sm font-semibold text-blueGray-600 mb-2']) }}
                   
               
                        {{ Form::text('name', '', ['class' => 'col-span-2 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
                 
                    @error('name')
                        <p class="text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                --}}