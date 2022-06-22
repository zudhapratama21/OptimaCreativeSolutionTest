@extends('/admin/layout/app_dashboard')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body ">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title">Data Article</h5>     
                    <a href="/article/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Thumbnail Title</th>
                            <th>Thumbnail Photo</th>                            
                            <th>Meta</th>
                            <th>Meta Title</th>
                            <th>Meta Description</th>
                            <th>Description</th>
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