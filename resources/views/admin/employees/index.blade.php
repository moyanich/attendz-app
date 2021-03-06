@section('title', 'Employees')
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <div class="text-xs uppercase font-light text-gray-500">
                {{ __('Listing') }}
            </div>
            <div class="text-xl font-bold">
                {{ __('Employees') }}
            </div>
            <div class="breadcrumb">
                <x-breadcrumbs></x-breadcrumbs> 
            </div>
        </div>
        <div class="flex-shrink-0 space-x-2">
            <a href="{{ route('admin.employees.create') }}" class="btn" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                {{ __('New Employee') }}
            </a>
        </div>
    </x-slot>

    {{-- Messages --}}
    <x-messages />
    {{-- End Messages --}}

    {{-- Content --}}

  {{--  <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
        <div class="rounded-t mb-0 px-4 py-3 border-0">
           <div class="flex flex-wrap items-center">
                <div class="relative w-full max-w-full flex-grow flex-1">
                    <h3 class="font-semibold text-base text-blueGray-700">{{ __('Employees') }}</h3>
                </div>
           </div>
        </div>
    
        <div class="block w-full overflow-x-auto">
            <table id="employees_table" class="items-center w-full bg-transparent border-collapse employees-table ">
                <thead class="bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-900 uppercase tracking-wider">
                            {{ __('No.') }} 
                        </th>
                        <th scope="col" class="px-6 bg-blueGray-50 text-gray-900 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            {{ __('Employee Name') }}
                        </th>
                        <th scope="col" class="px-6 bg-blueGray-50 text-gray-900 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            {{ __('Department') }}
                        </th>
                        <th scope="col" class="px-6 bg-blueGray-50 text-gray-900 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            {{ __('Status') }}
                        </th>
                       
                        <th scope="col" class="px-6 bg-blueGray-50 text-gray-900 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                 
                </tbody>
            </table>
        </div>

    </div>
    {{-- End Content --}}

    
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
        <div class="block w-full overflow-x-auto">
            <table id="example" class="items-center w-full bg-transparent border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 bg-blueGray-50 text-black align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            {{ __('#') }}
                        </th>
                        <th scope="col" class="px-6 bg-blueGray-50 text-black align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            {{ __('Emp. No.') }}
                        </th>
                        <th scope="col" class="px-6 bg-blueGray-50 text-black align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            {{ __('Name') }}
                        </th>
                        <th scope="col" class="px-6 bg-blueGray-50 text-black align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            {{ __('Position') }}
                        </th>
                        <th scope="col" class="px-6 bg-blueGray-50 text-black align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            {{ __('Department') }}
                        </th>
                        <th scope="col" class="px-6 bg-blueGray-50 text-black align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            {{ __('Status') }}
                        </th>
                        <th scope="col" class="px-6 bg-blueGray-50 text-black align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($employees as $key => $employee)
                        <tr>
                            <td class="border-t-0 px-6 align-middle text-center border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                {{ $loop->iteration }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                {{ $employee->id }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @if($employee->photo)
                                            <img class="h-10 w-10 rounded-full object-cover" 
                                        src="{{asset('/storage/images/'.$employee->photo)}}" alt="profile photo">
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $employee->firstname . ' ' . $employee->lastname }}
                                        </div>
                                        <div class="flex items-center">
                                            <div class="flex text-sm text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                </svg>
                                                <a href="mailto:{{ $employee->email }}" class="text-blue-500">{{ $employee->email }}</a>
                                                {{-- $employee->current_address.','.$employee->city --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                {{ $employee->job }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                {{ $employee->department }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                <x-statuses :message="strtolower($employee->status ?? '')">
                                    {{ $employee->status ?? '' }} 
                                </x-statuses>
                            </td>
                            <td class="flex flex-wrap items-center p-4">
                                <a href="{{ route('admin.employees.show', $employee->id) }}" class="flex items-center btn btn-info btn-sm mr-1 mb-1" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
            
                                <button class="flex items-center btn btn-error btn-sm mb-1" type="button" onclick="toggleModal('employee-delete-{{ $employee->id }}')">
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
   
    {{-- End Content --}}




</x-app-layout>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

{{-- 
<script type="text/javascript">
    $(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.employees-table').DataTable({
            processing: true,
            serverSide: true,
            select: true,
            ajax: "{{ route('admin.employees.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: 'fullname', name: 'fullname' },
                
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
    });
</script>
 --}}