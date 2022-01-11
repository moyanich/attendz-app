
        //$city->update($request->all());




const STATUS_ACTIVE    = 1;
    const STATUS_SUSPENDED = 2;
    const STATUS_INACTIVE  = 3;
  
    /**
     * Return list of status codes and labels

     * @return array
     */
    public static function listStatus()
    {
        // https://stackoverflow.com/questions/32917944/laravel-where-to-store-statuses-flags-model-class-or-config-folder
        return [
            self::STATUS_ACTIVE    => 'Active',
            self::STATUS_SUSPENDED => 'Suspended',
            self::STATUS_INACTIVE  => 'Inactive'
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = self::listStatus();
    }






/**
     * Store a newly created job resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeJobHistoryRequest  $request
     * @return \Illuminate\Http\Response
     * 
     */
   /* public function job_store(StoreEmployeeJobHistoryRequest $request, $id)
    {
        $today_date = Carbon::now()->format('Y-m-d');
        $job = new EmployeeJobHistory();
        $job->employee_id = $id;
        $job->job_id = $request->input('job');
        $job->department_id = $request->input('department');
        $job->contract_id = $request->input('contract');
        $job->notification_period = $request->input('notiifcation');
        $job->start_date = $request->input('start');
        $job->end_date = $request->input('end');

        $job->status_id = ($job->end_date >= $today_date || is_null($job->end_date) ) ? StatusCodes::active_status() : StatusCodes::inactive_status();
        $job->save(); 

        // Redirect to employee profile
        return redirect()->route('admin.employees.show', $id)->with('success', 'Job profile saved'); 
    } */

    /**
     * Edit the Employee Job information
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function job_edit($id)
    {
        $job = EmployeeJobHistory::findOrFail($id);
        $jobs  = Jobs::pluck('name', 'id')->prepend('Please select', ''); // Get Education Type Table
        $departments  = Departments::pluck('name', 'id')->prepend('Please select', ''); // Get Education Type Table
        $contracts = ContractTypes::pluck('name', 'id')->prepend('Please select', ''); // Get Education Type Table

        return view('admin.employees.edit-job', compact('job', 'jobs', 'departments', 'contracts'));
    } */

    /**
     * Update the Employee Job information
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function job_update(Request $request, $id)
    {
        $today_date = Carbon::now()->format('Y-m-d');
        $job = EmployeeJobHistory::findOrFail($id);
        $job->job_id = $request->input('job');
        $job->department_id = $request->input('department');
        $job->contract_id = $request->input('contract');
        $job->notification_period = $request->input('notiifcation');
        $job->start_date = $request->input('start');
        $job->end_date = $request->input('end');
        
        //$job->status_id = ($job->end_date < $today_date) ? StatusCodes::inactive_status() : StatusCodes::active_status();
        $job->status_id = ($job->end_date >= $today_date || is_null($job->end_date) ) ? StatusCodes::active_status() : StatusCodes::inactive_status();

        $job->save();

        return redirect()->route('admin.employees.show', $job->employee_id)->with('success', 'Job History updated');
    } */

    /**
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function job_destroy($id)
    {
        $job = EmployeeJobHistory::findOrFail($id);
        $job->delete();

        return redirect()->route('admin.employees.show', $job->employee_id)->with('success', 'Job History removed sucessfully');
    } */