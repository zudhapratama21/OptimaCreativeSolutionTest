@extends('/admin/layout/app_dashboard')
@section('breadchumb')
    <li class="breadcrumb-item"><a href="/medsos">Media Sosial</a></li>  
    
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body ">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title">Data Media Sosial</h5>                         
                </div>
                
                <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Type</th>
                            <th>Desc</th>                                                                                                                                           
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1 ;
                        @endphp
                        @foreach ($medsos as $item)
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

@endsection