<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $employees = Employees::orderBy('id', 'DESC')->paginate(10);

        return view('hr.employees.index', compact('employees'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
