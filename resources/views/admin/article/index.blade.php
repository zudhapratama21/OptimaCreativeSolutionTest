@extends('/admin/layout/app_dashboard')

@section('breadchumb')
    <li class="breadcrumb-item"><a href="/article">Article</a></li>  
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body ">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title">Data Article</h5>     
                    <a href="/article/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thumbnail Photo</th>                            
                            <th>Title</th>
                            <th>Thumbnail Title</th>                                                       
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                    <a type="button" data-toggle="modal" data-target="#modalEdit{{$article->id}}"  >
                                        <img src="{{ asset('storage/'. $article->thumbnail_photo) }}" alt="" width="35%" height="35%">
                                    </a>
                                </td>
                                <td>{{$article->title}}</td>
                                <td>{{$article->thumbnail_title}}</td>
                                <td>
                                    <a href="{{ route('article.show', ['article'=>$article->id]) }}" class="btn btn-info btn-sm mb-2" type="button" ><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('article.edit', ['article'=>$article->id]) }}" class="btn btn-success btn-sm mb-2" type="button" ><i class="fas fa-edit"></i></a>

                                    <form action="/article/{{$article->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                
                    </tbody>
                  
                </table>
            </div>
        </div>
    </div>
</div>

@foreach ($articles as $article)
<div class="modal fade bd-example-modal-lg" id="modalEdit{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Thumbnail Foto</h5>
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
@endforeach
@endsection