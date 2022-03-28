@extends('frontend.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-2">
                </div>{{-- end col-md-2 --}}
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hola.... <strong>{{Auth::user()->name}}</strong> Bienvenido a Game-Lot Hobbie Store</span></h3>
                    </div>{{-- end card --}}
                </div>{{-- end col-md-6 --}}
            </div>{{-- end row --}}
        </div>{{-- end container --}}
    </div>{{-- end body-content --}}

@endsection
