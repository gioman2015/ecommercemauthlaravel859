@extends('frontend.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br>
                    {{-- @php
                        $user = Auth::user();
                    @endphp --}}
                    <img style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))? url($user->profile_photo_path):url('upload/no_image.jpg') }}" height="100%" width="100%">
                    <ul class="list-group list-group-flush">
                        <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{route('change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
                </div>{{-- end col-md-2 --}}
                <div class="col-md-2">

                </div>{{-- end col-md-2 --}}
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hi.... <strong>{{Auth::user()->name}}</strong> Wellcome to easy Online Shop</span></h3>
                    </div>{{-- end card --}}
                </div>{{-- end col-md-6 --}}
            </div>{{-- end row --}}
        </div>{{-- end container --}}
    </div>{{-- end body-content --}}

@endsection