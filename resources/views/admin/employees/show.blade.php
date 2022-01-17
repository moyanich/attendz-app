@section('title', 'Employee Profile - ' . $employee->fullname . '')

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <div class="text-xs uppercase font-light text-gray-500">
                {{ __('Employee Profile') }}
            </div>
            <div class="text-xl font-bold">
                {{ $employee->completename ?? '' }}
            </div>
            <div class="breadcrumb">
                <x-breadcrumbs></x-breadcrumbs> 
            </div>
        </div>
    </x-slot>

    <x-messages />

    {{-- Content --}}
    <div class="card emp-profile relative flex flex-col min-w-0 break-words bg-white w-full mx-auto px-6 py-10 mb-6 shadow-2xl rounded">
        <div class="flex justify-end mb-3">
            <button class="flex items-center bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('employee-delete-modal')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                {{ __('Delete Employee Profile') }}
            </button>
        </div>
        
        <div class="block w-full overflow-x-auto">

            <div class="grid grid-cols-4 gap-4 border border-black py-8 px-6">
                <div class="flex items-start space-x-6 mb-4">
                    @if($employee->photo)
                        <img class="h-28 w-28 mask mask-circle" src="{{ asset('/storage/images/'.$employee->photo) }}" alt="{{ $employee->completename ?? '' }} photo">
                    @endif
                    <div class="">
                        <x-statuses :message="strtolower( $status->recentstatus ?? '' )">
                            {{  $status->recentstatus ?? ''}} 
                        </x-statuses>
                        <h2 class="text-xl text-gray-800 font-bold mb-1 flex content-center">
                            {{ $employee->completename ?? '' }}
                        </h2>
                    </div>
                </div>
                <div>
                    <div class="job mb-2">
                        <small class="text-xs text-gray-500 uppercase mb-1">{{ __('Job Title')  }}</small>
                        <p class="text-sm text-gray-500 uppercase mb-1">
                            <span class="font-bold text-gray-800">{{ $status->job_name ?? '' }}</span>
                        </p>
                    </div>

                    <div class="department mb-2">
                        <small class="text-xs text-gray-500 uppercase mb-1">{{ __('Department')  }}</small>
                        <p class="text-sm text-gray-500 uppercase mb-1">
                            <span class="font-bold text-gray-800">{{ $status->department_name ?? '' }}</span>
                        </p>
                    </div>
                </div>
                
                <div>
                    <div class="employment mb-2">
                        <small class="text-gray-500 uppercase mb-1">{{  __('Employee Number ')   }}</small>
                        <p class="text-sm text-gray-500 uppercase mb-1">
                            <span class="font-bold text-gray-800">{{ $employee->id }}</span>
                        </p>
                    </div>
                    
                    <div class="employment mb-2">
                        <small class="text-gray-500 uppercase mb-1">{{  __('Employment Type ')   }}</small>
                        <p class="text-sm text-gray-500 uppercase mb-1">
                            <span class="font-bold text-gray-800">{{  $status->contract ?? '' }}</span>
                        </p>
                    </div>
                </div>

                <div>
                    <div class="employment mb-2">
                        <small class="text-gray-500 uppercase mb-1">{{ __('Contact Information') }}</small>
                        <p class="flex text-sm text-gray-500 uppercase mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            <span class="font-bold text-gray-800">{{ $employee->phone_number ?? '' }}</span>
                        </p>
                    </div>

                    <div class="employment mb-4">
                        <small class="text-gray-500 uppercase mb-1">{{ __('Email Address')  }}</small>
                        <p class="flex text-sm text-gray-500  mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <a class="" href="mailto:{{ $employee->email ?? '' }}">{{ $employee->email ?? '' }}</a>
                        </p>
                    </div>
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

                            {{-- ----- PERSONAL INFORMATION ----- --}}
                            <section class="w-full personal">
                                <div class="w-full flex justify-between border-t border-r border-l border- border-gray-200 p-2">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                        <h2 class="font-bold ml-2">{{ __('Personal Information') }}</h2>
                                    </div>

                                    <button class="flex items-center btn btn-info btn-sm" type="button" onclick="toggleModal('personal-modal')">
                                        {{ __('Edit Profile') }}
                                    </button>
                                </div>
                                <div class="inner-tab border-b border-r border-gray-200 mb-8">
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
                                            @isset($gender->name)
                                                {{ $gender->name }}
                                            @endisset                                            
                                        </div>

                                        <div class="info-heading">
                                            {{ __('Hire Date') }}
                                        </div>
                                        <div class="info-text">
                                            {{ $employee->hire_date }}
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
                            </section>

                            {{-- ----- CONTACT INFORMATION ----- --}}
                            <section class="contact">
                                <div class="w-full flex justify-between border-t border-r border-l border- border-gray-200 p-2">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        <h2 class="font-bold ml-2">{{ __('Contact Information') }}</h2>
                                    </div>

                                    <button class="flex items-center btn btn-info btn-sm" type="button" onclick="toggleModal('contact-modal')">
                                        {{ __('Edit Contact') }}
                                    </button>
                                </div>

                                <div class="inner-tab border-b border-r border-gray-200 mb-8">
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
                                            @isset( $parish->id)
                                                {{ $parish->name }}
                                            @endisset
                                            {{-- $parish->name??'' --}}
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
                                        <div class="flex md:col-span-3 info-text items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                            </svg>
                                            <a href="mailto:{{ $employee->private_email  ?? '' }}">{{ $employee->private_email  ?? '' }}</a>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            {{-- ----- EDUCATION INFORMATION ----- --}}
                            <section class="education">
                                <div class="w-full flex justify-between border-t border-r border-l border- border-gray-200 p-2">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                        </svg>
                                        <h2 class="font-bold ml-2">{{ __('Education Details') }}</h2>
                                    </div>

                                    <a href="{{ route('admin.employees.education.create', $employee->id) }}" class="flex items-center btn btn-info btn-sm text-white" type="button"> 
                                        {{ __('Add Education') }}
                                    </a>
                                </div>

                                <div class="inner-tab border-b border-r border-gray-200 mb-8">
                                    <div class="overflow-x-auto">
                                        <table class="table w-full table-compact">
                                            <thead>
                                                <tr>
                                                    <th class="border border-gray-200">Qualification</th>
                                                    <th class="border border-gray-200">Institution</th>
                                                    <th class="border border-gray-200">Course</th>
                                                    <th class="border border-gray-200">Start</th>
                                                    <th class="border border-gray-200">End</th>
                                                    <th class="border border-gray-200">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="border border-gray-200">
                                                @foreach ($education ?? '' as $empEducation)
                                                    <tr>
                                                        <td>{{ $empEducation->name }}</td>
                                                        <td>{{ $empEducation->institution }}</td>
                                                        <td>{{ $empEducation->course }}</td>
                                                        <td>{{ $empEducation->startYear }}</td>
                                                        <td>{{ $empEducation->endYear }}</td>
                                                        <td class="flex flex-wrap justify-center p-4">
                                                            {{-- //TODO:   --}}
                                                            <a href="{{ route('admin.employees.education.edit', [$empEducation->employee_id, $empEducation->id]) }}" class="flex items-center bg-teal-500 text-white active:bg-teal-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"> 
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>

                            {{-- ----- Documents and Notes ----- --}}
                            <section class="notes">
                                <div class="flex justify-between space-x-4">
                                    <div class="w-full md:w-1/2 border-t border-r border-l border-b border-gray-200">
                                        <div class="w-full flex justify-between border-b border-gray-200 p-2">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                                </svg>
                                                <h2 class="font-bold ml-2">{{ __('Files/Documents') }}</h2>
                                            </div>

                                            <button class="flex items-center btn btn-info btn-sm" type="button" onclick="toggleModal('files-modal')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                {{ __('Add File') }}
                                            </button>
                                        </div>
                                        <div class="p-2 pt-4">
                                            <table class="table-striped items-center w-full bg-transparent border-collapse">
                                                <thead class="bg-gray-200">
                                                    <tr>
                                                        <th scope="col" class="px-6 bg-blueGray-50 text-gray-900 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                            {{ __('#') }}
                                                        </th>
                                                        <th scope="col" class="px-6 bg-blueGray-50 text-gray-900 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                            {{ __('File Name') }}
                                                        </th>
                                                        <th scope="col" class="px-6 bg-blueGray-50 text-gray-900 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                                            {{ __('Actions') }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($files ?? '' as $file)
                                                        <tr>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 whitespace-nowrap p-4">
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 whitespace-nowrap p-4">
                                                                {{ $file->description }}
                                                            </td>
                                                            <td class="flex flex-wrap justify-center p-4">
                                                                <a href="{{  asset('/storage/files/'. $file->name ) }}" class="flex items-center bg-teal-500 text-white active:bg-teal-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" target="_blank">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                    </svg>
                                                                </a>

                                                                <button class="flex items-center bg-teal-500 text-white active:bg-teal-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('file-edit-{{ $file->id }}')">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg>
                                                                </button> 

                                                                <button class="flex items-center bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('file-delete-{{ $file->id }}')">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                        <div class="w-full md:w-1/2 border-t border-r border-l border-b border-gray-200">
                                            <div class="w-full flex justify-between border-b border-gray-200 p-2">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                                    </svg> 
                                                    <h2 class="font-bold ml-2">{{ __('Notes') }}</h2>
                                                </div>
                                            
                                                {!! Form::open(['action' => ['App\Http\Controllers\Admin\EmployeesController@savenote', $employee->id], 'method' => 'POST']) !!}
                                                @csrf
                                    
                                                {{ Form::submit('Save Note', ['class' => 'flex items-center btn btn-info btn-sm']) }}
                            

                                                {{--<button class="flex items-center text-white px-4 py-2 font-bold uppercase text-xs bg-lightBlue-500 hover:bg-lightBlue-300 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('contact-modal')">
                                                    {{ __('Save') }}
                                                </button>--}}
                                            </div>
                                            <div class="p-2">
                                                {{ Form::textarea('notes', $employee->notes, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150', 'rows' => '8']) }}
                            
                                                @error('address')
                                                    <p class="text-xs text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                    {{Form::hidden('_method', 'PUT') }}
                                    {!! Form::close() !!}
                                </div>
                            </section>
                        </div>


                        {{-- JOB HISTORY - TAB 2 --}}
                        <div class="p-4 space-y-2" x-show="active === 1"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100">

                            {{-- ----- JOB INFORMATION ----- --}}
                            <section class="job-history">
                                <div class="w-full flex justify-between border-t border-r border-l border- border-gray-200 p-2">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                        </svg>
                                        <h2 class="font-bold ml-2">{{ __('Job History') }}</h2>
                                    </div>
                                    <a href="{{ route('admin.employees.job.create', $employee->id) }}" class="flex items-center btn btn-info btn-sm text-white" type="button"> 
                                        {{ __('Add New Job') }}
                                    </a>
                                </div>

                                <div class="inner-tab border-b border-r border-gray-200 mb-8">
                                    <div class="overflow-x-auto">
                                        <table class="table w-full table-compact">
                                            <thead>
                                                <tr>
                                                    <th class="border border-gray-200">#</th>
                                                    <th class="border border-gray-200">Job Title</th>
                                                    <th class="border border-gray-200">Department</th>
                                                    <th class="border border-gray-200">Contract Type</th>
                                                    <th class="border border-gray-200">Start</th>
                                                    <th class="border border-gray-200">End</th>
                                                    <th class="border border-gray-200">Status</th>
                                                    <th class="border border-gray-200">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="border border-gray-200">
                                                @foreach ($jobs as $job)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $job->job_name }}</td>
                                                        <td>{{ $job->department_name }}</td>
                                                        <td>{{ $job->contract }}</td>
                                                        <td>{{ $job->start_date }}</td>
                                                        <td>{{ $job->end_date }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            <x-statuses :message="strtolower($job->status)">
                                                                {{ $job->status }} 
                                                            </x-statuses>
                                                        </td>
                                                        <td class="flex flex-wrap justify-center p-4">
                                                            {{-- //TODO:   --}}
                                                           {{--   <a href="{{ route('admin.employees.edit-job', $job->JobID) }}" class="flex items-center bg-teal-500 text-white active:bg-teal-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"> 
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                            </a>
                                                            --}}    
                                                            <a href="{{ route('admin.employees.job.edit', [$job->employee_id, $job->JobID]) }}" class="flex items-center bg-teal-500 text-white active:bg-teal-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"> 
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>

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
                <span class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
                    ×
                </span>
                </button>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">
                
               {{-- FORM --}}
                {!! Form::open(['action' => ['App\Http\Controllers\Admin\EmployeesController@update', $employee->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <div class="flex-auto py-10 pt-0">
                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('photo', 'Profile Image', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                                    {{--  <input type="file" name="file" class="border-0 px-3 py-3 text-blueGray-600 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip">--}}

                                    <input type="file" name="photo" class="border-0 px-3 py-3 text-blueGray-600 border border-1 border-gray-600 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" accept=".jpg,.jpeg,.png">
                
                                    @error('photo')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

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
                {!! Form::open(['action' => ['App\Http\Controllers\Admin\EmployeesController@updatecontact', $employee->id], 'method' => 'POST']) !!}
                    @csrf
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
                                    {{ Form::label('city', 'City', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
        
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

                @csrf

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





{{-- File Add Modal --}}
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="files-modal">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                <h3 class="text-3xl font-semibold">
                    {{ __('Add File') }}
                </h3>
                <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('contact-modal')">
                <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                    ×
                </span>
                </button>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">
                {!! Form::open(['action' => ['App\Http\Controllers\Admin\FilesController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    {{ Form::hidden('employee_id', $employee->id ) }}

                    <div class="grid grid-cols-1 space-y-2">
                        {{ Form::label('description', 'Document Title', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mt-2']) }}
    
                        {{ Form::text('description', '', ['class' => 'text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500', 'placeholder' => 'Document Name']) }}

                        @error('description')
                            <p class="text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="relative w-full mb-3">
                        {{ Form::label('file', 'Upload File', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mt-4 mb-2']) }}
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg id="svg-image" class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <div id="fileList"></div> 

                                <div class="text-sm text-gray-600">
                                    <label for="file" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>{{ __('Upload a file') }}</span>
                                        <input id="file" name="file" type="file" class="sr-only" accept=".jpg,.jpeg,.png,.doc,.docx,.csv,.xlsx,.xls,.txt,.pdf,.zip" onchange="javascript:updateList()">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">
                                    {{ __('PNG, JPG, JPEG, PDF, DOC, XLS, XLSX up to 10MB') }}
                                </p>
                                @error('file')
                                    <p class="text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!--footer-->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-1 mb-1 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleModal('files-modal')">
                            {{ __('Cancel') }}
                        </button>

                        {{ Form::submit('Save', ['class' => 'mt-3 w-full inline-flex justify-center rounded-md border border-blue-600 shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-1 mb-1 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cursor-pointer']) }}
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="files-modal-backdrop"></div>





{{-- File Edit Modal --}}
@foreach($files ?? '' as $key => $file)
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="file-edit-{{ $file->id }}">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                    <h3 class="text-3xl font-semibold">
                        {{ __('Edit File') }}
                    </h3>
                    <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('contact-modal')">
                    <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                        ×
                    </span>
                    </button>
                </div>
                <!--body-->
                <div class="relative p-6 flex-auto">
                    {!! Form::open(['action' => ['App\Http\Controllers\Admin\FilesController@update', $file->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @csrf
                        <div class="flex-auto py-10 pt-0">
                            <div class="flex flex-wrap">
                                {{ Form::hidden('employee_id', $employee->id ) }}
                                <div class="relative w-full mb-3">
                                    {{ Form::label('description', 'Document Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}
        
                                    {{ Form::text('description', $file->description, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}
                                </div>

                                <div class="relative w-full mb-3 text-left flex items-center ">
                                    <svg xmlns='http://www.w3.org/2000/svg' class='h-12 w-12 text-gray-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'></svg>
                                    <span class="mr-2">{{ $file->name }}</span>
                                </div>

                                <div class="relative w-full mb-3">
                                    {{ Form::label('file', 'Upload File', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2 mt-4']) }}
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg id="svg-imageEdit" class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                            <div id="fileListEdit"></div>

                                            <div class="text-sm text-gray-600">
                                                <label for="fileEdit" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>{{ __('Upload a file') }}</span>
                                                    <input id="fileEdit" name="file" type="file" value="{{ $file->name }}" class="sr-only" accept=".jpg,.jpeg,.png,.doc,.docx,.csv,.xlsx,.xls,.txt,.pdf,.zip" onchange="javascript:updateList()">
                                                </label>
                                            </div>
                                            <p class="text-xs text-gray-500">
                                                {{ __('PNG, JPG, JPEG, PDF, DOC, XLS, XLSX up to 10MB') }}
                                            </p>
                                            @error('file')
                                                <p class="text-xs text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--footer-->
                        <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-1 mb-1 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleModal('file-edit-{{ $file->id }}')">
                                {{ __('Cancel') }}
                            </button>

                            {{ Form::submit('Save', ['class' => 'mt-3 w-full inline-flex justify-center rounded-md border border-blue-600 shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-1 mb-1 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cursor-pointer']) }}
                        </div>
                    
                    {{ Form::hidden('_method', 'PUT') }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="file-edit-{{ $file->id }}-backdrop"></div>
@endforeach





{{-- Files Edit Modal --}}
{{--  
@foreach($files ?? '' as $key => $file)
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="file-edit-{{ $file->id }}">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: outline/exclamation -->
                            <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                {{ __('Update File') }}
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    {!! Form::open(['action' => ['App\Http\Controllers\Admin\FilesController@update', $file->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @csrf
                        <div class="flex-auto py-10 pt-0">
                            <div class="flex flex-wrap">
                                <div class="relative w-full mb-3">
                                    {{ Form::label('description', 'Document Name', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                                    {{ Form::text('description', $file->description, ['class' => 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150']) }}

                                    @error('description')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="relative w-full mb-3">
                                    {{ Form::label('file', 'Upload Document', ['class' => 'block uppercase text-blueGray-600 text-xs font-bold mb-2']) }}

                                    <input type="file" name="file" class="border-0 px-3 py-3 text-blueGray-600 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip">

                                    @error('file')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--footer-->
                        <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-1 mb-1 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleModal('file-edit-{{ $file->id }}')">
                                {{ __('Cancel') }}
                            </button>

                            {{ Form::submit('Update', ['class' => 'mt-3 w-full inline-flex justify-center rounded-md border border-blue-600 shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-1 mb-1 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cursor-pointer']) }}
                        </div>

                    {{ Form::hidden('_method', 'PUT') }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endforeach
--}}





<script>
    updateList = function() {
        var input = document.getElementById('file');
        var output = document.getElementById('fileList');
        var svg = document.getElementById('svg-image' );

        output.innerHTML = "<div class='space-y-1 text-center'><svg xmlns='http://www.w3.org/2000/svg' class='mx-auto h-12 w-12 text-gray-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'></svg>";
        for (var i = 0; i < input.files.length; ++i) {
            output.innerHTML += '<div>' + input.files.item(i).name + '</div>';
        }
        output.innerHTML += '</div>';

        svg.classList.add("hidden");
    }
</script>

<script>
    updateList2 = function() {
        var input = document.getElementById('fileEdit');
        var output = document.getElementById('fileListEdit');
        var svg = document.getElementById('svg-imageEdit' );

        output.innerHTML = "<div class='space-y-1 text-center'><svg xmlns='http://www.w3.org/2000/svg' class='mx-auto h-12 w-12 text-gray-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'></svg>";
        for (var i = 0; i < input.files.length; ++i) {
            output.innerHTML += '<div>' + input.files.item(i).name + '</div>';
        }
        output.innerHTML += '</div>';

        svg.classList.add("hidden");
    }
</script>
