@extends('/admin/layout/app_dashboard')

@section('breadchumb')
    <li class="breadcrumb-item"><a href="/article">Article</a></li>  
    <li class="breadcrumb-item">Edit Data</li>  
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Data Award</h5>
            </div>
            <div class="card-body ">

             <form action="{{ route('article.update', ['article'=>$article->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf         
                @method('PUT')       
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Title Article</label>
                            <input type="text" name="title" value="{{ $article->title }}" class="form-control" >
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Thumbnail Title</label>
                            <input type="text" name="thumbnail_title" value="{{ $article->thumbnail_title }}" class="form-control" >
                            @error('thumbnail_title')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="">Thumbnail Photo</label><br>
                        <a type="button" data-toggle="modal" data-target="#modalEdit"  >
                            <img src="{{ asset('storage/' . $article->thumbnail_photo) }}" class="mb-2" alt="" width="240px" height="240px">                                                        
                        </a> 
                        <input type="file" name="thumbnail_photo" value="{{ $article->thumbnail_photo }}" class="form-control" >

                    @error('thumbnail_photo')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Meta</label>
                            <input type="text" name="meta" value="{{ $article->meta }}" class="form-control" >
                            @error('meta')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Meta Article</label>
                            <input type="text" name="meta_title" value="{{ $article->meta_title }}" class="form-control" >
                            @error('meta_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Meta Description</label> 
                    <input type="name" name="meta_description" value="{{ $article->meta_description }}" class="form-control" >
                    @error('meta_description')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea type="name" name="description" id="summernote" class="form-control" >
                        {{ $article->description }}
                    </textarea>
                    @error('description')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>          
                

                <div class="form-group col-2">
                    <button class="btn btn-primary btn-block">Save</button>
                </div>                   
            </form>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-header">                
                        <div class="d-flex justify-content-between mb-2">
                            <h6 class="card-title">Foto Product</h6>
                            <a class="addFotoArticle btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('article.uploadFoto', ['article'=>$article->id]) }}" method="POST" enctype="multipart/form-data">
                            
                            @csrf                                                   
                            <div class="form-group d-flex justify-content-between">
                                <input type="file" name="foto_article[]" class="form-control" required>                                                          
                            </div>

                            <div class="fotoArticle"></div>
    
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-header">  
                        <div class="d-flex justify-content-between mb-2">
                            <h6 class="card-title">Foto Article</h6>                            
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($article->articlePhoto as $item)
                        <div class="row">
                            <div class="card-body d-flex align-items-center">
                                <div class="col-md-3">
                                    <a type="button" data-toggle="modal" data-target="#modalEdit{{$item->id}}"  >
                                        <img src="{{ asset('storage/' . $item->photo_article) }}" class="mb-2" alt="" width="100%" height="100%">                                                        
                                    </a>                            
                                </div>
    
                                <div class="col-md-3">
                                    <form action="{{ route('article.deleteFoto', ['articleFoto'=>$item->id]) }}" method="POST" enctype="multipart/form-data">                                        
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></button>
                                    </form>
                                    
                                </div>
                                
                            </div>
                        </div>                    
                    @endforeach
                    </div>
                </div>
            </div>
           

        </div>
    </div>
</div>

{{-- modal thumbnail --}}
<div class="modal fade bd-example-modal-lg" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Thumbnail Award</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="card-body">
                <img src="{{ asset('storage/'. $article->thumbnail_photo) }}" alt="" width="100%" height="100%">
            </div>                  
        </div>
    </div>
</div> 


@endsection

@section('js')
    <script>
        //  foto article
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