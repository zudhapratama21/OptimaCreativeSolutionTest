@extends('/admin/layout/app_dashboard')
@section('breadchumb')
    <li class="breadcrumb-item"><a href="/profile">Profile</a></li>      
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body ">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="card-title">Data Profile</h5>                         
                </div>
                <div class="col-6">
                <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" value="{{$user->email}}">
                        </div>

                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>

                            
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>

                        @error('password_confirmation')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        

                        <div class="form-group">                            
                            <button class="btn btn-primary btn-block">Save</button>
                        </div>

                </form>
            </div>
               
            </div>
        </div>
    </div>
</div>
    
@endsection