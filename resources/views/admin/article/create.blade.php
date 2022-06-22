@extends('/admin/layout/app_dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tambah Data Article</h5>
            </div>
            <div class="card-body ">

                <form action="">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Title Article</label>
                                <input type="text" name="name_application" class="form-control" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Thumbnail Title</label>
                                <input type="text" name="name_application" class="form-control" >
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="">Thumbnail Photo</label>
                        <input type="file" name="name_application" class="form-control" >
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Meta</label>
                                <input type="text" name="name_application" class="form-control" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Meta Article</label>
                                <input type="text" name="name_application" class="form-control" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Meta Description</label>
                        <input type="name" name="name_application" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="name" name="description" class="form-control" ></textarea>
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