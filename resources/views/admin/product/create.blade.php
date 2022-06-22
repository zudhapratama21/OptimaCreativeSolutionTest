@extends('/admin/layout/app_dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tambah Data Product</h5>
            </div>
            <div class="card-body ">

                <form action="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name Application</label>
                            <input type="text" name="name_application" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Thumbnail Photo</label>
                            <input type="file" name="name_application" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Name Company</label>
                            <input type="text" name="name_company" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Industry</label>
                            <input type="text" name="industry" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Link</label>
                            <input type="text" name="name_company" class="form-control" >
                        </div>
                        
                        <div class="form-group">
                            <label for="">Size</label>
                            <input type="text" name="name_company" class="form-control" >
                        </div>
                    </div>
                </div>
               
              
                <div class="form-group">
                    <label for="">Location</label>
                    <textarea name="location" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Case</label>
                    <textarea name="case" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Works</label>
                    <textarea name="works" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <h6 class="card-title">Foto Product</h6>
                    <a class="addFotoProduk btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>

                <div class="form-group d-flex justify-content-between">
                    <input type="file" name="foto_produk[]" class="form-control">                    
                </div>

                <div class="fotoProduk"></div>

                <div class="form-group col-2">
                    <button class="btn btn-primary btn-block">Save</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>


@endsection