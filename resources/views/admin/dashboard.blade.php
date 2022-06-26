@extends('/admin/layout/app_dashboard')



@section('content')
<div class="row stats-row">
        <div class="col-lg-3 col-md-12">
            <div class="card card-transparent stats-card">
                <div class="card-body">
                    <div class="stats-info">
                        <h5 class="card-title">{{$service}}</h5>
                        <p class="stats-text">Total Service</p>
                    </div>                   
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="card card-transparent stats-card">
                <div class="card-body">
                    <div class="stats-info">
                        <h5 class="card-title">{{$product}}</h5>
                        <p class="stats-text">Total Product</p>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="card card-transparent stats-card">
                <div class="card-body">
                    <div class="stats-info">
                        <h5 class="card-title">{{$article}}</h5>
                        <p class="stats-text">Total Article</p>
                    </div>                   
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title">{{$award}}</h5>
                            <p class="stats-text">Total Award</p>
                        </div>                   
                    </div>
                </div>
            </div>
    </div>

    <div class="row stats-row">
        <div class="col-lg-3 col-md-12">
            <div class="card card-transparent stats-card">
                <div class="card-body">
                    <div class="stats-info">
                        <h5 class="card-title">{{$sosmed}}</h5>
                        <p class="stats-text">Total Media Sosial</p>
                    </div>                   
                </div>
            </div>
        </div>      
    </div>

    <div class="row">
        <div class="col-md-6">
                <div class="card card-transactions">
                    <div class="card-body">
                        <h5 class="card-title">
                                List Service

                                <a href="/service" class="card-title-helper blockui-transactions">
                                        Detail Service
                                </a>
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                        <tr>
                                                <th>#</th>
                                                <th>Name Service</th>
                                                <th>Is active</th>
                                                                          
                                        </tr>
                                </thead>
                                <tbody>
                                        @php
                                        $no=1;
                                        @endphp
                                    @foreach ($listservice as $services)
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

            <div class="col-md-6">
                <div class="card card-transactions">
                    <div class="card-body">
                        <h5 class="card-title">
                                List Product

                                <a href="/product" class="card-title-helper blockui-transactions">
                                        Detail Product
                                </a>
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>                                        
                                        <th>Name Application</th>
                                        <th>Name Company</th>                            
                                        <th>Link</th>                                                                                                                          
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1 ;
                                @endphp
                                @foreach ($listproduct as $product)
                                    <tr>
                                        <td>{{$no}}</td>                                       
                                        <td>{{$product->name_application}}</td>
                                        <td>{{$product->name_company}}</td>                               
                                        <td>{{$product->link}}</td>                                      
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
    </div>

    <div class="row">
        <div class="col-md-6">
                <div class="card card-transactions">
                    <div class="card-body">
                        <h5 class="card-title">
                                List Award

                                <a href="/award" class="card-title-helper blockui-transactions">
                                     Detail Award
                                </a>
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>                                        
                                        <th>Name Article</th>
                                        <th>Description</th>                                                                    
                                    </tr>
                                </thead>
                                <tbody>
                                        @php
                                        $no=1;
                                        @endphp
                                    @foreach ($listaward as $award)
                                    <tr class="align-items-center">
                                        <td>{{$no}}</td>                                       
                                        <td>
                                            {{$award->name}}
                                        </td>
                                        <td>
                                            {{$award->description}}
                                        </td>                                                                                                                                        
                                        @php
                                            $no++;
                                        @endphp
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

            <div class="col-md-6">
                <div class="card card-transactions">
                    <div class="card-body">
                        <h5 class="card-title">
                                List Article

                                <a href="/article" class="card-title-helper blockui-transactions">
                                        Detail Article
                                </a>
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>                                        
                                        <th>Title</th>
                                        <th>Thumbnail Title</th>                                                                                                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                @endphp
                                @foreach ($listarticle as $article)
                                    <tr>
                                        <td>{{$no++}}</td>                                       
                                        <td>{{$article->title}}</td>
                                        <td>{{$article->thumbnail_title}}</td>                                      
                                    </tr>
                                @endforeach
                                </tbody>
                            </table> 
                        </div>     
                    </div>
                </div>
            </div>
    </div>

    <div class="row">
        <div class="col-md-6">
                <div class="card card-transactions">
                    <div class="card-body">
                        <h5 class="card-title">
                                List Media Sosial

                                <a href="/mediasosial" class="card-title-helper blockui-transactions">
                                     Detail Media Sosial
                                </a>
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Type</th>                                                                                                                                                                                  
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1 ;
                                @endphp
                                @foreach ($listsosmed as $item)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>
                                            {{$item->username}}
                                        </td>
                                        <td>{{$item->type}}</td>
                                        <td>
                                            <a href="{{$item->description}}">
                                                {{$item->description}}
                                            </a>
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
    </div>
@endsection