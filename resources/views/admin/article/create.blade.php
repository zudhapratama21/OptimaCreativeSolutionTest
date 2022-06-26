@extends('/admin/layout/app_dashboard')
@section('breadchumb')
    <li class="breadcrumb-item"><a href="/article">Article</a></li>  
    <li class="breadcrumb-item">Create Data</li>  
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tambah Data Article</h5>
            </div>
            <div class="card-body ">

                <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Title Article</label>
                                <input type="text" name="title" value="{{ @old('title') }}" class="form-control" >
                                @error('title')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Thumbnail Title</label>
                                <input type="text" name="thumbnail_title" value="{{ @old('thumbnail_title') }}" class="form-control" >
                                @error('thumbnail_title')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="">Thumbnail Photo</label>
                        <input type="file" name="thumbnail_photo" value="{{ @old('thumbnail_photo') }}" class="form-control" >
                        @error('thumbnail_photo')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Meta</label>
                                <input type="text" name="meta" value="{{ @old('meta') }}" class="form-control" >
                                @error('meta')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Meta Article</label>
                                <input type="text" name="meta_title" value="{{ @old('meta_title') }}" class="form-control" >
                                @error('meta_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Meta Description</label> 
                        <input type="name" name="meta_description" value="{{ @old('meta_description') }}" class="form-control" >
                        @error('meta_description')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="name" name="description" id="summernote" class="form-control" >
                            {{ @old('description') }}
                        </textarea>
                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>          

                    <div class="d-flex justify-content-between mb-2">
                        <h6 class="card-title">Foto Product</h6>
                        <a class="addFotoArticle btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>

                    <div class="form-group d-flex justify-content-between">
                        <input type="file" name="foto_article[]" class="form-control">                    
                    </div>

                    <div class="fotoArticle"></div>

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
    $(document).ready(function() {
        $('#summernote').summernote();
    });

    //foto Produk
  $('.addFotoArticle').on('click',function(){
       addFotoArticle();
  });

   function addFotoArticle(){
     var addFotoArticle =`
                <div class="form-group d-flex justify-content-between">
                    <input type="file" name="foto_article[]" class="form-control">
                    <a class="hapusFoto btn btn-danger btn-sm btn-outline"><i class="fas fa-trash text-red"></i></a>
                </div>

                       `;                        
     $('.fotoArticle').append(addFotoArticle);       
   }

   $(document).on("click", "a.hapusFoto", function () {
           $(this).parent().remove();
   });
</script>


    
@endsection