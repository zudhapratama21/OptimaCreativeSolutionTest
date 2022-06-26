@extends('/admin/layout/app_dashboard')
@section('breadchumb')
    <li class="breadcrumb-item"><a href="/product">Product</a></li>  
    <li class="breadcrumb-item">Show Data</li>  
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Product</h5>
            </div>
            <div class="card-body ">    
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        <strong>Type Service : </strong>    
                                    </label>
                                    <p>{{$product->service->name}}</p>
                                </div>                                
                                <div class="form-group">
                                    <label for="">
                                        <strong>Name Application : </strong>    
                                    </label>
                                    <p>{{$product->name_application}}</p>
                                </div>                               
                                <div class="form-group">
                                    <label for="">
                                        <strong>Industry : </strong>    
                                    </label>
                                    <p>{{$product->industry}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">
                                        <strong>Name Company : </strong>    
                                    </label>
                                    <p>{{$product->name_company}}</p>
                                </div>

                                <div class="form-group">
                                    <label for="">
                                        <strong>Link : </strong>    
                                    </label>
                                    <p>{{$product->link}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">
                                        <strong>Size : </strong>    
                                    </label>
                                    <p>{{$product->size}}</p>
                                </div>
                            </div>                         
                        </div>

                        <div class="form-group">
                            <label for="">
                                <strong>Location : </strong>    
                            </label>
                            <p>{{$product->location}}</p>
                        </div>

                        <div class="form-group">
                            <label for="">
                                <strong>Case : </strong>    
                            </label>
                            <p>{{$product->case}}</p>
                        </div>

                        <div class="form-group">
                            <label for="">
                                <strong>Works : </strong>    
                            </label>
                            <p>{{$product->works}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">
                                <strong>Thumbnail Photo</strong>                                
                            </label>
                            <div>
                                <a type="button" data-toggle="modal" data-target="#modalEdit"  >
                                    <img src="{{ asset('storage/'. $product->thumbnail_photo) }}" alt="" width="50%" height="50%">
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                <strong>Photo Product</strong>
                            </label>
                            <div class="owl-carousel owl-theme">
                                @foreach ($product->productPhoto as $item)
                                <div class="item">                                                                                  
                                    <a type="button" data-toggle="modal" data-target="#modalEdit{{$item->id}}"  >
                                        <img src="{{ asset('storage/' . $item->photo_product) }}" alt="" height="300px" width="300px">                                                                                                                
                                    </a>                                    
                                </div>                                
                                @endforeach                            
                            </div>
                        </div>                                                

                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>


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

@foreach ($product->productPhoto as $item)
<div class="modal fade bd-example-modal-lg" id="modalEdit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Photo Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="card-body">
                <img src="{{ asset('storage/'. $item->photo_product) }}" alt="" width="100%" height="100%">
            </div>                  
        </div>
    </div>
</div> 
@endforeach

@endsection

@section('js')
<script>    

    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:3,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})

</script>
    
@endsection