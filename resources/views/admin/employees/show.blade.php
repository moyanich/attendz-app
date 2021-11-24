@section('title', 'Employee Profile - ' . $employee->fullname . '')
<x-app-layout>
    <x-slot name="header">
        <div class="w-full mb-6 pt-3">
            <div class="flex flex-row items-center justify-between mb-4">
                <div class="flex flex-col">
                    <div class="text-xs uppercase font-light text-gray-500">
                        {{ __('Employee Profile') }}
                    </div>
                    <div class="text-xl font-bold">
                        {{ $employee->completename }}
                    </div>
                    <div class="breadcrumb">
                        <x-breadcrumbs></x-breadcrumbs> 
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="flex"><x-messages /></div>

    {{-- Content --}}
    <div class="emp-profile relative flex flex-col min-w-0 break-words bg-white w-full mx-auto px-6 py-10 mb-6 shadow-lg rounded">
        <div class="flex justify-end mb-3">
            <button class="flex items-center bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('employee-delete-modal')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>
        
        <div class="block w-full overflow-x-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-5 border border-black divide-y divide-gray-200 py-8 px-6">              
                <div class="flex items-start space-x-6 mb-4">
                    <img class="h-28 w-28 object-cover object-center rounded-full" 
                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
                    <div>
                        <p class="text-xl text-gray-800 font-bold mb-1">
                            {{ $employee->completename }}
                        </p>
                        <p class="text-sm text-gray-800 font-bold mb-1">
                            Job here and position
                        </p>
                        <p class="flex text-sm text-gray-500 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            {{ $employee->phone_number }}</p>
                        <p class="flex text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <a class="" href="mailto:{{ $employee->email }}">{{ $employee->email }}</a>
                        </p>
                    </div>
                </div>                
                <div>
                    <table class="w-full border-collapse border border-gray-200">
                        <tbody>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap bg-gray-100 border border-gray-200">
                                    {{ __('Employee Number') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border border-gray-200">{{ $employee->id }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap bg-gray-100 border border-gray-200">
                                    {{ __('ID Number') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border border-gray-200">NUMBER HERE</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="w-full">
                {{-- TABS --}}
                <div x-data="{active: 0}">
                    <div class="flex border border-b-2 border-black overflow-hidden -mb-px">
                        <button class="px-4 py-2 w-full" x-on:click.prevent="active = 0" x-bind:class="{'bg-black text-white': active === 0}">
                            {{ __('Profile') }}
                        </button>
                        <button class="px-4 py-2 w-full" x-on:click.prevent="active = 1" x-bind:class="{'bg-black text-white': active === 1}">
                            {{ __('Job History') }}
                        </button>
                        <button class="px-4 py-2 w-full" x-on:click.prevent="active = 2" x-bind:class="{'bg-black text-white': active === 2}"> 
                            {{ __('Leave History') }}
                        </button>
                    </div>
                    <div class="border border-black -mt-px">

                        {{-- TAB 1 --}}
                        <div class="p-4 space-y-2" x-show="active === 0"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100">

                            {{-- ----- PERSONAL INFORMATION --}}
                            <div class="mb-8">
                                <div class="w-full flex justify-between border-t border-r border-l border- border-gray-200 p-2">
                                    <h2 class="font-bold">{{ __('Personal Information') }}</h2>
                                    <button class="flex items-center text-white px-4 py-2 font-bold uppercase text-xs bg-lightBlue-500 hover:bg-lightBlue-300 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('personal-modal')">
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                                <div class="inner-tab border-b border-r border-gray-200">
                                    <div class="grid md:grid-cols-6 profile-info">
                                        <div class="info-heading">
                                            {{ __('Date of Birth') }}
                                        </div>
                                        <div class="info-text">
                                            {{ format_date($employee->date_of_birth) }}
                                        </div>

                                        <div class="info-heading">
                                            {{ __('Gender') }}
                                        </div>
                                        <div class="info-text">
                                            {{ $gender->name ?? '' }}
                                        </div>

                                        <div class="info-heading">
                                            {{ __('Hire Date') }}
                                        </div>
                                        <div class="info-text">
                                            {{ format_date($employee->hire_date) }}
                                        </div>

                                        <div class="info-heading">
                                            {{ __('Retirement Date') }}
                                        </div>
                                        <div class="info-text">
                                            @if (@empty($employee->retirement_date))
                                                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-red-600 bg-red-200 uppercase last:mr-0 mr-1">
                                                    {{ __('Update DOB Field') }}
                                                </span> 
                                            @else
                                            {{ format_date($employee->retirement_date) }}
                                            @endif
                                        </div>

                                        <div class="info-heading">
                                            {{ __('NIS') }}
                                        </div>
                                        <div class="info-text">
                                            {{ $employee->nis }}
                                        </div>

                                        <div class="info-heading">
                                            {{ __('TRN') }}
                                        </div>
                                        <div class="info-text">
                                            {{ hyphenate($employee->trn) }}
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            {{-- ----- CONTACT INFORMATION --}}
                            <div class="mb-8">
                                <div class="w-full flex justify-between border-t border-r border-l border- border-gray-200 p-2">
                                    <h2 class="font-bold">{{ __('Contact Information') }}</h2>
                                    <button class="flex items-center text-white px-4 py-2 font-bold uppercase text-xs bg-lightBlue-500 hover:bg-lightBlue-300 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('contact-modal')">
                                        {{ __('Edit') }}
                                    </button>
                                </div>

                                <div class="inner-tab border-b border-r border-gray-200">
                                    <div class="grid md:grid-cols-6 profile-info">
                                        <div class="info-heading">
                                            {{ __('Address') }}
                                        </div>
                                        <div class="md:col-span-5 info-text">
                                            {{ $employee->current_address }}
                                        </div>
                                    </div>

                                    <div class="grid md:grid-cols-6 profile-info">
                                        <div class="info-heading">
                                            {{ __('City') }}
                                        </div>
                                        <div class="info-text">
                                            {{ $employee->city }}
                                        </div>

                                        <div class="info-heading">
                                            {{ __('Parish') }}
                                        </div>
                                        <div class="info-text">
                                            {{ $parish->name ?? '' }}
                                        </div>

                                        <div class="info-heading">
                                            {{ __('Home Phone') }}
                                        </div>
                                        <div class="info-text">
                                            {{ $employee->phone_number }}
                                        </div>
                                    </div>

                                    <div class="grid md:grid-cols-6 profile-info">
                                        <div class="info-heading">
                                            {{ __('Emergency Number') }}
                                        </div>
                                        <div class="info-text">
                                            {{ $employee->emergency_number }}
                                        </div>

                                        <div class="info-heading">
                                            {{ __('Private Email') }}
                                        </div>
                                        <div class="md:col-span-3 info-text">
                                            <a href="mailto:{{ $employee->private_email }}">{{ $employee->private_email }}</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- TAB 2 --}}
                        <div class="p-4 space-y-2" x-show="active === 1"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100">
                            <h2 class="text-2xl">Panel 2 Using x-show.transition</h2>
                            <p>Panel 2 content</p>
                        </div>

                        {{-- TAB 3 --}}
                        <div class="p-4 space-y-2" x-show="active === 2"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100">
                            <h2 class="text-2xl">Panel 3 Using x-transition</h2>
                            <p>Panel 3 content</p>
                        </div>
                    </div>
                </div>
             


            </div>
        </div>
    </div>
    {{-- End Content --}}

</x-app-layout>


       


{{-- Personal Info Modal --}}
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="personal-modal">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                <h3 class="text-3xl font-semibold">
                    {{ __('Update Employee Information') }}
                </h3>
                <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('personal-modal')">
                <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                    ×
                </span>
                </button>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">
                
               {{--  FORM --}}
                {!! Form::open(['action' => ['App\Http\Controllers\Admin\EmployeesController@update', $employee->id], 'method' => 'POST']) !!}

                    <div class="flex-auto py-10 pt-0">
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('firstname', 'First Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
                                    
                                    {{ Form::text('firstname', $employee->firstname, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
                
                                    @error('firstname')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('middlename', 'Middle Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
                
                                    {{ Form::text('middle_name', $employee->middlename, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
                                </div>
                            </div>
                
                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('lastname', 'Last Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
        
                                    {{ Form::text('lastname', $employee->lastname, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
        
                                    @error('lastname')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('dob', 'Date of Birth', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
        
                                    {{ Form::date('dob', $employee->date_of_birth, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
        
                                    @error('dob')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('gender', 'Gender', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                                    {!! Form::select('gender', $genders, $employee->gender_id, ['class' => 'form-select block w-full mt-1 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) !!}

                                    @error('gender')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

        
                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('hire_date', 'Hire Date', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
        
                                    {{ Form::date('hire_date', $employee->hire_date, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
        
                                    @error('hire_date')
                                        <p class="text-xs text-red-600">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('nis', 'NIS', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
        
                                    {{ Form::text('nis', $employee->nis, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
        
                                    @error('nis')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('trn', 'TRN', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
        
                                    {{ Form::text('trn', $employee->trn, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
        
                                    @error('trn')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('retirement_date', 'Retirement Date', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
        
                                    {{ Form::date('retirement_date', $employee->retirement_date, ['class' => 'border-0 px-3 py-3 font-semibold text-white bg-amber-500 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'disabled']) }}
                                </div>
                            </div>

                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('email', 'Company Email', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
        
                                    {{ Form::email('email', $employee->email, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--footer-->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-1 mb-1 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleModal('personal-modal')">
                            {{ __('Cancel') }}
                        </button>

                        {{ Form::submit('Update', ['class' => 'mt-3 w-full inline-flex justify-center rounded-md border border-blue-600 shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-1 mb-1 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cursor-pointer']) }}
                    </div>

                {{Form::hidden('_method', 'PUT') }}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="personal-modal-backdrop"></div>



{{-- Contact Modal --}}
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="contact-modal">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                <h3 class="text-3xl font-semibold">
                    {{ __('Update Employee Information') }}
                </h3>
                <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('contact-modal')">
                <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                    ×
                </span>
                </button>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">
                
               {{--  FORM --}}
                {!! Form::open(['action' => ['App\Http\Controllers\Admin\EmployeesController@update_contact', $employee->id], 'method' => 'POST']) !!}

                    <div class="flex-auto py-10 pt-0">
                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('Address', 'Address', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
                                    
                                    {{ Form::textarea('address', $employee->current_address, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'rows' => '4']) }}
                
                                    @error('address')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('lcity', 'City', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
        
                                    {{ Form::text('city', $employee->city, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
                                  
                                </div>
                            </div>
                
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('parish', 'Parish', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                                    {!! Form::select('parish', $parishes, $employee->parish_id, ['class' => 'form-select block w-full mt-1 border-0 px-3 py-3 placeholder-blueGray-400 text-gray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) !!}
                
                                </div>
                            </div>
                           
                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('phone_number', 'Phone Number', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
        
                                    {{ Form::text('phone_number', $employee->phone_number, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
        
                                    @error('phone_number')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('emergency_number', 'Emergency Number', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
        
                                    {{ Form::text('emergency_number', $employee->emergency_number, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
        
                                    @error('emergency_number')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('private_email', 'Private Email', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
        
                                    {{ Form::email('private_email', $employee->private_email, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
        
                                    @error('trn')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <!--footer-->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-1 mb-1 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleModal('contact-modal')">
                            {{ __('Cancel') }}
                        </button>

                        {{ Form::submit('Update', ['class' => 'mt-3 w-full inline-flex justify-center rounded-md border border-blue-600 shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-1 mb-1 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cursor-pointer']) }}
                    </div>

                {{Form::hidden('_method', 'PUT') }}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="contact-modal-backdrop"></div>





{{-- Delete Employee Modal --}}
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="employee-delete-modal">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            {{ __('Delete record') }}
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                {{ __('Are you sure you want to delete the record for') }}
                                    <strong>{{$employee->firstname . ' ' . $employee->lastname }}</strong>
                                {{ __('? All of your data will be permanently removed. This action cannot be undone.') }}
                            </p>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <!-- Form -->
                {!! Form::open(['action' => ['App\Http\Controllers\Admin\EmployeesController@destroy', $employee->id], 'method' => 'POST']) !!}

                {{ Form::submit('Delete', ['class' => 'w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm']) }}

                {{Form::hidden('_method', 'DELETE') }}
                {!! Form::close() !!}
              
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleModal('employee-delete-modal')">
                    {{ __('Cancel') }}
                </button>
            </div>
        </div>
    </div>
</div>




