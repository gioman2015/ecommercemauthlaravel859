@extends('frontend.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')

                
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hola.... <strong>{{Auth::user()->name}}</strong> Actualiza tu perfil</span></h3>
                    </div>{{-- end card --}}
                    <div class="card-body">
                        <form method="POST" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Nombre <span></span></label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                 @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>{{-- end form user name --}}
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Correo <span>*</span></label>
                                <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                 @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>{{-- end form user email --}}
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Telefono <span>*</span></label>
                                <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                                 @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>{{-- end form user phone --}}
                            <div class="form-group">
                                <h5>Imagen de perfil <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="profile_photo_path" class="form-control" id="image">
                                </div>
                            </div>{{-- end form user image --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Actualizar</button>
                            </div>
                        </form>{{-- end form --}}
                    </div>{{-- end card-body --}}
                </div>{{-- end col-md-6 --}}
            </div>{{-- end row --}}
        </div>{{-- end container --}}
    </div>{{-- end body-content --}}

@endsection