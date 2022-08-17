<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    
    public function index()
    {
        $company = Company::paginate(10);

        return view('admin.company.index',[
            'company' => $company
        ]);

    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $data = $request->all();        
        $logo = $request->file('logo');
        
        if ($logo) {
            $filename = $logo->getClientOriginalName();            
            $time = time();
            $newName = $time.$filename;            
            $path = Storage::putFileAs('logo',$logo,$newName);
            $data['logo'] = $path; 
        }

        $company = Company::create($data);

        return back();
                
    }

    
    public function show($id)
    {
        $company = Company::findOrFail($id);
        if ($company) {
                        
            return view('admin.company.show',[
                'company' => $company
            ]);

        }else{
            abort(404);
        }
    }

   
    public function edit($id)
    {
        //
    }

  
    public function update(CompanyRequest $request, $id)
    {
        $data = $request->all();        
        $logo = $request->file('logo');

        $company = Company::findOrFail($id);

        if ($company) {
            if ($logo) {
                $filename = $logo->getClientOriginalName();            
                $time = time();
                $newName = $time.$filename;            
                $path = Storage::putFileAs('logo',$logo,$newName);
                $data['logo'] = $path; 
            }

            $company->update($data);
            return back();

        } else {
            abort(404);
        }
                            
    }

  
    public function destroy($id)
    {
        $company = Company::findOrFail($id); 

        if ($company) {
            Storage::disk('public')->delete($company->photo_product);                    
            $company->delete();
            return back();
        }else{
            abort(404);
        }
        

        
    }
}
