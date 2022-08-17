@extends('/admin/layout/app_dashboard')

@section('breadchumb')
    <li class="breadcrumb-item">Company</li>      
@endsection


@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body ">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title">Data Company</h5>     
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </div>
                
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($company as $companies)
                                <tr>
                                    <td>{{$no}}</td>
                                   <td>
                                      <img src="{{ asset('storage/'. $companies->logo) }}" alt="" width="50px" height="50px">
                                   </td>
                                   <td>{{$companies->name}}</td>
                                   <td>{{$companies->email}}</td>
                                   <td>{{$companies->website}}</td>
                                    
                                    <td class="d-flex align-items-center "> 
                                        
                                        <a href="{{ route('company.show', ['company'=>$companies->id]) }}" class="btn btn-info btn-sm mr-2"><i class="fas fa-eye"></i> Detail</a>
                                        <button class="btn btn-success btn-sm mr-2" type="button" data-toggle="modal" data-target="#modalEdit{{$companies->id}}"><i class="fas fa-edit"></i> Edit</button>

                                        <form action="/company/{{$companies->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    
                    </tbody>
                  
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ @old('name') }}" required>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                   <div class="form-group">
                        <label for="">Logo</label>
                        <input type="file" name="logo" class="form-control">
                        @error('logo')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                   </div>

                   <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ @old('email') }}" required>
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Website</label>
                    <input type="text" name="website" class="form-control" value="{{ @old('website') }}" required>
                    @error('website')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
          
        </div>
    </div>
</div>

@foreach ($company as $companies)
<div class="modal fade" id="modalEdit{{$companies->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form action="{{ route('company.update', ['company'=>$companies->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name Company</label>
                        <input type="text" name="name" class="form-control" value="{{$companies->name}}" required>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">                        
                        <label for="">Logo</label> <br>
                        <img src="{{ asset('storage/'. $companies->logo) }}" alt="" width="80px" height="80px">
                        <input type="file" name="logo" class="form-control">
                        @error('logo')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                   </div>

                   <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$companies->email}}" required>
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Website</label>
                    <input type="text" name="website" class="form-control" value="{{$companies->website}}" required>
                    @error('website')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
          
        </div>
    </div>
</div>
@endforeach

@endsection