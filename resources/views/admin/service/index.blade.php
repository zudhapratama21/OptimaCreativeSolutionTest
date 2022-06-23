@extends('/admin/layout/app_dashboard')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body ">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title">Data Services</h5>     
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </div>
                
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name Service</th>
                            <th>Is active</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($service as $services)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$services->name}}</td>
                                        <td>
                                        @if ($services->is_active == 1)
                                            <span class="badge badge-primary">Yes</span>
                                        @else
                                            <span class="badge badge-danger badge-sm">No</span>
                                        @endif
                                    </td>
                                    
                                    <td class="d-flex align-items-center "> 
                                        <button class="btn btn-success btn-sm mr-2" type="button" data-toggle="modal" data-target="#modalEdit{{$services->id}}"><i class="fas fa-edit"></i> Edit</button>

                                        <form action="/service/{{$services->id}}" method="POST">
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form action="{{ route('service.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name Service</label>
                        <input type="text" name="name" class="form-control" value="{{ @old('name') }}" required>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Is Active</label>
                        <select name="is_active" class="form-control" id="" required>
                            <option value="" selected disabled>Choose is active</option>
                            <option value="1">Iya</option>
                            <option value="0">Tidak</option>
                        </select>
                        @error('is_active')
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

@foreach ($service as $services)
<div class="modal fade" id="modalEdit{{$services->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form action="{{ route('service.update', ['service'=>$services->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name Service</label>
                        <input type="text" name="name" class="form-control" value="{{$services->name}}" required>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Is Active</label>
                        <select name="is_active" class="form-control" id="" required>
                            @if ($services->is_active==1)
                                <option value="1" selected>Iya</option>
                                <option value="0">Tidak</option>    
                            @else
                                <option value="1">Iya</option>
                                <option value="0" selected>Tidak</option>    
                            @endif
                            
                        </select>
                        @error('is_active')
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