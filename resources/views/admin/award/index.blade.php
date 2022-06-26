@extends('/admin/layout/app_dashboard')
@section('breadchumb')
    <li class="breadcrumb-item"><a href="/award">Award</a></li>  
    
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body ">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title">Data Award</h5>     
                    <a href="/award/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>           
                </div>
                
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thumbail Photo</th>
                            <th>Name Article</th>
                            <th>Description</th>                            
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($award as $item)
                            <tr class="align-items-center">
                                <td>{{$no}}</td>
                                <td>
                                    <a type="button" data-toggle="modal" data-target="#modalEdit{{$item->id}}"  >
                                        <img src="{{ asset('storage/'. $item->thumbnail_photo) }}" alt="" width="40%" height="40%">
                                    </a>
                                </td>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    {{$item->description}}
                                </td>
                                
                                <td class="align-items-center "> 
                                    <a href="{{ route('award.show', ['award'=>$item->id]) }}" class="btn btn-info btn-sm mb-2" type="button" ><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('award.edit', ['award'=>$item->id]) }}" class="btn btn-success btn-sm mb-2" type="button" ><i class="fas fa-edit"></i></a>

                                    <form action="/award/{{$item->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></button>
                                    </form>
                                    
                                </td>                                                                    
                                @php
                                    $no++;
                                @endphp
                            </tr>
                        @endforeach
                
                    </tbody>
                  
                </table>
            </div>
        </div>
    </div>
</div>

@foreach ($award as $awards)
<div class="modal fade bd-example-modal-lg" id="modalEdit{{$awards->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Thumbnail Aplikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="card-body">
                <img src="{{ asset('storage/'. $awards->thumbnail_photo) }}" alt="" width="100%" height="100%">
            </div>                  
        </div>
    </div>
</div> 
@endforeach
@endsection