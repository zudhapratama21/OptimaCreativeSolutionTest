@extends('/admin/layout/app_dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tambah Data Product</h5>
            </div>
            <div class="card-body ">

                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Service Type</label>
                        <select name="service_id" id="" class="form-control" required>
                            <option value="" selected disabled>Choose Service</option>
                            @foreach ($services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
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
                            <input type="text" name="name_application" class="form-control" value="{{ @old('name_application') }}" required>

                            @error('name_application')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Thumbnail Photo</label>
                            <input type="file" name="thumbnail_photo" class="form-control"  required>

                            @error('thumbnail_photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Name Company</label>
                            <input type="text" name="name_company" value="{{ @old('name_company') }}" class="form-control" required>

                            @error('name_company')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Industry</label>
                            <input type="text" name="industry" value="{{ @old('industry') }}" class="form-control" required>

                            @error('industry')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Link</label>
                            <input type="text" name="link" value="{{ @old('link') }}" class="form-control" required>

                            @error('link')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="">Size</label>
                            <input type="text" name="size" value="{{ @old('size') }}" class="form-control" required>
                            @error('size')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>               
              
                <div class="form-group">
                    <label for="">Location</label>
                    <textarea name="location" id="" cols="30" rows="3" class="form-control" required>
                        {{ @old('location') }}
                    </textarea>
                    @error('location')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Case</label>
                    <textarea name="case"  cols="30" rows="3" class="form-control" required>
                        {{ @old('case') }}
                    </textarea>
                    @error('case')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Works</label>
                    <textarea name="works" id="" cols="30" rows="3" class="form-control" required>
                        {{ @old('works') }}
                    </textarea>
                    @error('works')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
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
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>


@endsection