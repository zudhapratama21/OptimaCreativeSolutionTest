<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
    public function index()
    {
        $service = Service::all();

        return view('admin.service.index',[
          'service' => $service
        ]);
    }
    
   
    public function store(ServiceRequest $request)
    {
        $data = $request->all();

        Service::create($data);

        return back();
    }

    
    public function edit($id)
    {
        
    }

    public function update(ServiceRequest $request, $id)
    {
        $data = $request->all();
        $service=Service::findOrFail($id);
        $service->update($data);

        return back();

    }

    
    public function destroy($id)
    {
        $service = Service::findOrFail($id);                        
        $service->delete();

        

        return back();
    }
}
