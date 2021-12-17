<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EducationTypes;
use App\Models\Employees;
use App\Models\Files;
use App\Models\Genders;
use App\Models\Parishes;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use DataTables;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Input\Input;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //$this->authorize('admin'); // return 403
        //$this->authorize('hr-access'); // return 403


        if(Gate::allows('admin') || Gate::allows('hr-access')) { 
           
            $employees = Employees::get();

            if ($request->ajax()) {
                return Datatables::of($employees)
                ->addColumn('status', function ($statusRow) {
                    // TODO: refactor 
                    /* if ($statusRow->status == "Active") { 
                        return '<div class="px-2 flex text-sm leading-5 font-semibold bg-transparent rounded-full items-center"><i class="fas fa-circle fa-xs text-emerald-500 mr-1 leading-none"></i></div>'; 
                    }
                    else if ($statusRow->status == "Inactive") { 
                        return '<div class="px-2 flex text-sm leading-5 font-semibold bg-transparent rounded-full items-center"><i class="fas fa-circle fa-xs text-red-500 mr-1 leading-none"></i></div>'; 
                    }
                    else { 
                        return ''; 
                    } */
                })
                ->addIndexColumn()
                    ->addColumn('action', function($row) {
                        return '<div class="flex flex-wrap items-center p-4">
                                <a href="' . route('admin.employees.show', $row->id) . ' " class="flex items-center bg-teal-500 text-white active:bg-teal-600 font-bold uppercase text-xs px-2 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                            </div>';
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
            }   
                 
            return view('admin.employees.index')->with('employees', $employees); 

        } else {
            echo 'You must be an administrator.';
        }
       


        
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::where('name', 'like', '%Employee%')->first();
        $genders['genders'] = Genders::pluck('name', 'id')->toArray(); // Get Genders Table
        return view('admin.employees.create')
        ->with('role', $role)
        ->with('genders', $genders);
    }

    /**
     * Store a newly created employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|unique:employees',
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role' => 'required',
        ]);

        $employee = new Employees();
        $employee->id = $request->input('id');
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->gender_id = $request->input('gender');
        $employee->email = $request->input('email');

        /* Calculate Retirement based on Gender and DOB */
       /*$year = Genders::select('retirementYears')->where('id', '=', $employee->gender_id)->get()->first();
        $newDate = Carbon::parse($employee->date_of_birth)->addYears($year->retirementYears)->format('Y-m-d');
        $employee->retirement_date = $newDate; */
        
        $employee->save();
    
        $user = User::create([
            'employee_id' => $request->input('id'),
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
        ]);

        $user->roles()->sync($request->input('role'));
        Password::sendResetLink($request->only(['email']));

        return redirect()->route('admin.employees.show', $request->input('id'))->with('success', 'New employee created successfully. Go ahead and complete the employee profile. Activation email sent!'); // Redirect to employee profile
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employees::findOrFail($id);
        $gender = Genders::find($employee->gender_id);
        $genders['genders'] = Genders::pluck('name', 'id')->toArray(); // Get Genders Table
    
        $parish = Parishes::find($employee->parish_id);
        //dd($parish);

        $parishes = Parishes::pluck('name', 'id')->toArray(); // Get Genders Table
        $files = Files::where('employee_id', $id)->get();

        return view('admin.employees.show')
            ->with('employee', $employee)
            ->with('genders', $genders)
            ->with('gender', $gender)
            ->with('parish', $parish)
            ->with('parishes', $parishes)
            ->with('files', $files);
           // ->with('employments', $employments)
           // ->with('recentEmployment', $recentEmployment); 
           ; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function edit($id)
    {
        $employee = Employees::findOrFail($id);
        return view('admin.employees.edit')
            ->with('employee', $employee);
    } */

    /**
     * Update the employee personal information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'dob' => 'required',
                'nis' => ['nullable', Rule::unique('App\Models\Employees')->ignore($id, 'id'), 'max:9'],
                'trn' => ['nullable', Rule::unique('App\Models\Employees')->ignore($id, 'id'),  'min:9', 'max:9'],
                'photo' => 'image|nullable',
            ]
        );
        
        $employee = Employees::findOrFail($id);
        $employee->firstname = $request->input('firstname');
        $employee->middlename = $request->input('middlename');
        $employee->lastname = $request->input('lastname');
        $employee->date_of_birth = $request->input('dob');
        $employee->gender_id = $request->input('gender');
        $employee->hire_date = $request->input('hire_date');
        $employee->trn = $request->input('trn');
        $employee->nis = $request->input('nis');
        $employee->email = $request->input('email');
        
        /* Calculate Retirement based on Gender and DOB */
        $year = Genders::select('retirementYears')->where('id', '=', $employee->gender_id)->get()->first();
        $newDate = Carbon::parse($employee->date_of_birth)->addYears($year->retirementYears)->format('Y-m-d');
        $employee->retirement_date = $newDate;

        /* Store Profile Image */
        if($request->hasFile('photo')){
            $filename = $request->photo->getClientOriginalName();
            $request->photo->storeAs('images', $filename, 'public');
            $employee->update(['photo' => $filename]);
        }  

        $employee->save();
        return redirect()->back()->with('success', 'Employee profile updated sucessfully!!');
    }

    /**
     * Update the employee contact information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatecontact(Request $request, $id)
    {
        $this->validate($request,
            [
                
            ]
        );

        $employee = Employees::findOrFail($id);
        $employee->current_address = $request->input('address');
        $employee->city = $request->input('city');
        $employee->parish_id = $request->input('parish'); 
        $employee->phone_number = $request->input('phone_number');
        $employee->emergency_number = $request->input('emergency_number');
        $employee->private_email = $request->input('private_email');
         
       // $employee->notes = $request->input('notes'); 
    
        $employee->save();
        return redirect()->back()->with('success', 'Employee Contact Information updated sucessfully!!');
    }

    /**
     * Update the employee contact information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function savenote(Request $request, $id)
    {
        $employee = Employees::findOrFail($id);
        $employee->notes = $request->input('notes'); 
        $employee->save();
        return redirect()->back()->with('success', 'Note Saved!!');
    }

    /**
     * Remove the employee resource from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employees::findOrFail($id);
        $employee->delete();

        return redirect('/admin/employees')->with('success', 'Employee ' . $employee->firstname . ' ' . $employee->lastname . ' removed sucessfully'); 
    }

    /**
     * Update the employee contact information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function education(Request $request, $id)
    {
        $employee = Employees::findOrFail($id);
        
        $educationTypes['educationTypes'] = EducationTypes::pluck('name', 'id')->toArray(); // Get Genders Table

        return view('admin.employees.education')
        ->with('educationTypes', $educationTypes);

        //return redirect()->back()->with('success', 'Note Saved!!');
    }

    public function education_store(Request $request)
    {

        $this->validate($request, [
            'education' => 'required',
            'school' => 'required',
            'course' => 'required',
            'start' => 'email|unique:users,email',
            'end' => 'required|unique:users,username',
        ]);

       /* $education = new Employees();
        $employee->id = $request->input('id');
        $employee->institution = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->education_types_id = $request->input('gender');
        $employee->startYear = $request->input('email');
        $employee->endYear = $request->input('email');

     
        
        $employee->save(); */

        /*
        $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
                $table->string('institution', 100)->comment('Institution Name');
                $table->unsignedBigInteger('education_types_id')->nullable()->default(null);
                $table->date('startYear')->nullable();
                $table->date('endYear')->nullable();
               
                */
    }


    //employees.education

    
}



    
    // BEGIN FILES
    /**
     * Update the employee contact information.
     *
     * @param  \Illuminate\Http\StoreFilesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function addfile($id)
    {
        
    }  */

    /**
     * Update the employee contact information.
     *
     * @param  \Illuminate\Http\StoreFilesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function editfile($id)
    {
        $files = Files::findOrFail($id);
        return view('admin.employees.edit-file')
            ->with('files', $files);
    } */

    /**
     * Update the employee contact information.
     *
     * @param  \Illuminate\Http\UpdateFilesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function updatefile(UpdateFilesRequest $request, $id)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'filename' => 'required',
        ]);


        $file = Files::findOrFail($id);
        $file->employee_id = $request->input('employee_id');
        $file->filename = $request->input('filename');
        

        if($request->hasFile('file')) {
            $file->name = $request->input('filename');
            $file->type = $type;
            $file->size = $size;
            $fileName = auth()->id() . '_' . time() . '.'. $request->file->extension();
            $type = $request->file->getClientMimeType();
            $size = $request->file->getSize();
            $request->file->storeAs('files', $fileName, 'public');
        }  

        if($request->input('file') == true)
    
        $file->save();


       /* $fileName = auth()->id() . '_' . time() . '.'. $request->file->extension();   

        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();


        $request->file->storeAs('files', $fileName, 'public');

        Files::create([
            'employee_id' => $request->input('employee_id'),
            'filename' => $request->input('filename'),
            'name' => $fileName,
            'type' => $type,
            'size' => $size
        ]); 

        return redirect()->back()->with('success', 'File Uploaded sucessfully!!');
    }*/
