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
                <div class="form-group">
                    <label for="">Name Awards</label>
                    <input type="text"  name="name" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <h6 class="card-title">Foto Award</h6>
                    <a class="addFotoAward btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>

                <div class="form-group d-flex justify-content-between">
                    <input type="file" name="foto_award[]" class="form-control">                    
                </div>

                <div class="fotoAward"></div>

                <div class="form-group col-2">
                    <button class="btn btn-primary btn-block">Save</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>


@endsection