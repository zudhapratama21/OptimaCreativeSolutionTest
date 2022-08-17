<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $company = Company::get();
        $employee = Employee::with('companyrel')->paginate(10);
                


        return view('admin.employee.index',[
            'company' => $company,
            'employee' => $employee
        ]);

    }

    public function create()
    {
        //
    }


    public function store(EmployeeRequest $request)
    {
        $data = $request->all();
        Employee::create($data);

        return back();
    }

    public function show($id)
    {
        $employee = Employee::with('companyrel')->first();
        
        return view('admin.employee.show',[
            'employee' => $employee
        ]);
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $employee = Employee::findOrFail($id);
        if ($employee) {
            $employee->update($data);
            return back();
        }else{
            abort(404);
        }
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        if ($employee) {
            $employee->delete();
            return back();
        }else{
            abort(404);
        }
    }
}
