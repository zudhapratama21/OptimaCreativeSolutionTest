@extends('/admin/layout/app_dashboard')

@section('breadchumb')
    <li class="breadcrumb-item">Employee</li>      
@endsection


@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body ">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title">Data Employee</h5>     
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </div>
                
                {{-- @dd($employee) --}}
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($employee as $emp)
                                <tr>
                                    <td>{{$no}}</td>
                                  
                                   <td>{{$emp->first_name}}</td>
                                   <td>{{$emp->last_name}}</td>
                                   <td>{{$emp->companyrel->name}}</td>
                                   <td>{{$emp->email}}</td>
                                   <td>{{$emp->phone}}</td>
                                    
                                    <td class="d-flex align-items-center "> 
                                        
                                        <a href="{{ route('employee.show', ['employee'=>$emp->id]) }}" class="btn btn-info btn-sm mr-2"><i class="fas fa-eye"></i> Detail</a>
                                        <button class="btn btn-success btn-sm mr-2" type="button" data-toggle="modal" data-target="#modalEdit{{$emp->id}}"><i class="fas fa-edit"></i> Edit</button>

                                        <form action="/employee/{{$emp->id}}" method="POST">
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form action="{{ route('employee.store') }}" method="POST" >
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{ @old('first_name') }}" required>
                        @error('first_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ @old('last_name') }}" required>
                        @error('last_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Company</label>                        
                        <select name="company" class="form-control" id="">
                            <option value="" selected disabled>Choose Company</option>
                            @foreach ($company as $companies)
                                <option value="{{$companies->id}}">{{$companies->name}}</option>
                            @endforeach
                        </select>

                        @error('company')
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
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ @old('phone') }}" required>
                    @error('phone')
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

@foreach ($employee as $emp)
<div class="modal fade" id="modalEdit{{$emp->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form action="{{ route('employee.update', ['employee'=>$emp->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">                   

                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{$emp->first_name}}" required>
                        @error('first_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{$emp->last_name}}" required>
                        @error('last_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Company</label>                        
                        <select name="company" class="form-control" id="">                            
                            @foreach ($company as $companies)
                                @if ($companies->id == $emp->companyrel->id)
                                    <option value="{{$companies->id}}" selected>{{$companies->name}}</option>     
                                @else
                                    <option value="{{$companies->id}}">{{$companies->name}}</option>
                                @endif
                               
                            @endforeach
                        </select>

                        @error('company')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                   

                   <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$emp->email}}" required>
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                   </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{$emp->phone}}" required>
                    @error('phone')
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