@extends('/admin/layout/app_dashboard')

@section('breadchumb')
    <li class="breadcrumb-item"><a href="/product">Product</a></li>  
    <li class="breadcrumb-item">Edit Data</li>  
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Data Product</h5>
            </div>
            <div class="card-body ">
                
                <form action="{{ route('product.update', ['product'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Service Type</label>
                        <select name="service_id" id="" class="form-control" required>                            
                            @foreach ($services as $service)
                                @if ($service->id == $product->service_id)
                                    <option value="{{$service->id}}" selected>{{$service->name}}</option>    
                                @else
                                    <option value="{{$service->id}}">{{$service->name}}</option>    
                                @endif                                                                
                            @endforeach

                            @error('service_id')
                               <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </select>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name Application</label>
                            <input type="text" name="name_application" class="form-control" value="{{ $product->name_application }}" required>

                            @error('name_application')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Thumbnail Photo</label> <br>
                            <a type="button" data-toggle="modal" data-target="#modalEdit"  >
                                <img src="{{ asset('storage/' . $product->thumbnail_photo) }}" class="mb-2" alt="" width="50%" height="50%">                                                        
                            </a>                            
                            <input type="file" name="thumbnail_photo" class="form-control" value="{{$product->thumbnail_photo}}" >

                            @error('thumbnail_photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Name Company</label>
                            <input type="text" name="name_company" value="{{ $product->name_company }}" class="form-control" required>

                            @error('name_company')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Industry</label>
                            <input type="text" name="industry" value="{{ $product->industry }}" class="form-control" required>

                            @error('industry')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Link</label>
                            <input type="text" name="link" value="{{ $product->link}}" class="form-control" required>

                            @error('link')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="">Size</label>
                            <input type="text" name="size" value="{{ $product->size }}" class="form-control" required>
                            @error('size')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>               
              
                <div class="form-group">
                    <label for="">Location</label>
                    <textarea name="location" id="" cols="30" rows="3" class="form-control" required>
                        {{ $product->location }}
                    </textarea>
                    @error('location')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Case</label>
                    <textarea name="case"  cols="30" rows="3" class="form-control" required>
                        {{ $product->case }}
                    </textarea>
                    @error('case')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Works</label>
                    <textarea name="works" id="" cols="30" rows="3" class="form-control" required>
                        {{ $product->works }}
                    </textarea>
                    @error('works')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>                
                <div class="form-group col-2">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
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
                        <a class="addFotoProduk btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
                </div>       
                <div class="card-body">
                    <form action="{{ route('produk.upload', ['product'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf                        
                        <div class="form-group d-flex justify-content-between">
                            <input type="file" name="foto_produk[]" class="form-control">                    
                        </div>
            
                        <div class="fotoProduk"></div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-md-6">
                @foreach ($product->productPhoto as $item)
                    <div class="row">
                        <div class="card-body d-flex align-items-center">
                            <div class="col-md-3">
                                <a type="button" data-toggle="modal" data-target="#modalEdit{{$item->id}}"  >
                                    <img src="{{ asset('storage/' . $item->photo_product) }}" class="mb-2" alt="" width="100%" height="100%">                                                        
                                </a>                            
                            </div>

                            <div class="col-md-3">
                                <form action="{{ route('produk.delete', ['fotoProduk'=>$item->id]) }}" method="POST" enctype="multipart/form-data">
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

{{-- modal thumbnail --}}
<div class="modal fade bd-example-modal-lg" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Thumbnail Aplikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="card-body">
                <img src="{{ asset('storage/'. $product->thumbnail_photo) }}" alt="" width="100%" height="100%">
            </div>                  
        </div>
    </div>
</div> 

    {{-- modal product --}}
    {{-- @foreach ($product->productPhoto as $item)
    <div class="modal fade bd-example-modal-lg" id="modalEdit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Thumbnail Aplikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="card-body">
                    <img src="{{ asset('storage/'. $item->photo_product) }}" alt="" width="100%" height="100%">
                </div>                  
            </div>
        </div>
    </div
    @endforeach --}}

@endsection