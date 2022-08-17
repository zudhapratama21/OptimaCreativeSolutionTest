@extends('/admin/layout/app_dashboard')

@section('breadchumb')
    <li class="breadcrumb-item">
        <a href="/company">Company</a>
    </li>      
    <li class="breadcrumb-item">Detail</li>   
@endsection


@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body ">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title">Data Company</h5>                        
                </div> 
                
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="" class="form-control" value="{{$company->name}}" id="" readonly>
                </div>

                <div class="form-group">
                    <label for="">Logo</label> <br>
                    <img src="{{ asset('storage/'. $company->logo) }}" alt="" width="100px" height="100px" readonly>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="" class="form-control" value="{{$company->email}}" id=""  readonly>
                </div>

                <div class="form-group">
                    <label for="">Website</label>
                    <input type="text" name="" class="form-control" value="{{$company->website}}" id=""  readonly>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection