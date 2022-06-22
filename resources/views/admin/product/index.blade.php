@extends('/admin/layout/app_dashboard')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body ">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title">Data Product</h5>     
                    <a href="/product/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>           
                </div>
                
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name Application</th>
                            <th>Name Company</th>
                            <th>Location</th>
                            <th>Industry</th>
                            <th>Size</th>
                            <th>Case</th>
                            <th>Works</th>
                            <th>Link</th>                                                        
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>

                
                    </tbody>
                  
                </table>
            </div>
        </div>
    </div>
</div>
@endsection