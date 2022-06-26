@extends('/admin/layout/app_dashboard')

@section('breadchumb')
    <li class="breadcrumb-item"><a href="/award">Award</a></li>  
    <li class="breadcrumb-item">Create Data</li>  
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tambah Data Award</h5>
            </div>
            <div class="card-body ">

             <form action="/award" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name Awards</label>
                    <input type="text"  name="name" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="">Thumbnail Photo</label>
                    <input type="file" name="thumbnail_photo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <h6 class="card-title">Foto Award</h6>
                    <a class="addFotoAward btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="form-group col-2">
                    <button class="btn btn-primary btn-block">Save</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
        //  foto award
  $('.addFotoAward').on('click',function(){
       addFotoAward();
  });

   function addFotoAward(){
     var addFotoAward =`
                <div class="form-group d-flex justify-content-between">
                    <input type="file" name="foto_award[]" class="form-control">
                    <a class="hapusFoto btn btn-danger btn-sm btn-outline"><i class="fas fa-trash text-red"></i></a>
                </div>
                `;                        
     $('.fotoAward').append(addFotoAward);       
   }

   $(document).on("click", "a.hapusFoto", function () {
           $(this).parent().remove();
   });

    </script>
@endsection