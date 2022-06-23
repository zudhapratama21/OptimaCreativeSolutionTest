@extends('/admin/layout/app_dashboard')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body ">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title">Data Product</h5>     
                    <a href="/product/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>           
                </div>
                
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thumbnail Photo</th>
                            <th>Name Application</th>
                            <th>Name Company</th>                            
                            <th>Link</th>                                                        
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1 ;
                        @endphp
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$no}}</td>
                                <td>
                                    <a type="button" data-toggle="modal" data-target="#modalEdit{{$product->id}}"  >
                                        <img src="{{ asset('storage/'. $product->thumbnail_photo) }}" alt="" width="50%" height="50%">
                                    </a>
                                </td>
                                <td>{{$product->name_application}}</td>
                                <td>{{$product->name_company}}</td>                               
                                <td>{{$product->link}}</td>
                                <td class="d-flex align-items-center "> 
                                    <a href="{{ route('product.show', ['product'=>$product->id]) }}" class="btn btn-info btn-sm mr-2" type="button" ><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('product.edit', ['product'=>$product->id]) }}" class="btn btn-success btn-sm mr-2" type="button" ><i class="fas fa-edit"></i></a>

                                    <form action="/product/{{$product->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></button>
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

@foreach ($products as $product)
<div class="modal fade bd-example-modal-lg" id="modalEdit{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
@endforeach

@endsection