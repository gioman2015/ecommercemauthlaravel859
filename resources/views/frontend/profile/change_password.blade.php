@extends('frontend.main_master')
@section('content')

{{-- @php
    $user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp --}}

    <div class="body-content">
        <div class="container">
            <div class="row">
                 @include('frontend.common.user_sidebar')

                
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Change Password</span></h3>
                    </div>{{-- end card --}}
                    <div class="card-body">
                        <form method="POST" action="{{route('user.password.update')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Current Password</label>
                                <input type="password" id="current_password" name="oldpassword" class="form-control" placeholder="Current Password">
                                @error('oldpassword')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>{{-- end current password --}}
                            <div class="form-group">
                                <label for="exampleFormControlPassword3">New Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="New Password">
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>{{-- end new password --}}
                            <div class="form-group">
                                <label for="exampleFormControlPassword3">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>{{-- end confirm password --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </form>{{-- end form --}}
                    </div>{{-- end card-body --}}
                </div>{{-- end col-md-6 --}}
            </div>{{-- end row --}}
        </div>{{-- end container --}}
    </div>{{-- end body-content --}}

@endsection