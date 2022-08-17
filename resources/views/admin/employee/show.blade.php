@extends('/admin/layout/app_dashboard')

@section('breadchumb')
    <li class="breadcrumb-item">
        <a href="/employee">Employee</a>
    </li>      
    <li class="breadcrumb-item">Detail</li>   
@endsection


@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body ">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title">Data Employee</h5>                        
                </div> 
                
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{$employee->first_name}}" readonly>
                   
                </div>

                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{$employee->last_name}}" readonly>
                   
                </div>

                <div class="form-group">
                    <label for="">Company</label>                        
                    <input type="text" name="last_name" class="form-control" value="{{$employee->companyrel->name}}" readonly>
                </div>
               

               <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$employee->email}}" readonly>
                   
               </div>

            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{$employee->phone}}" readonly>
               
            </div>
                

            </div>
        </div>
    </div>
</div>



@endsection