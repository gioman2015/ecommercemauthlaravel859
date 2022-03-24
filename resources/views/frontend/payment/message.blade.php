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
                        <h3 class="text-center"><span class="text-danger">Hi.... <strong>{{Auth::user()->name}}</strong> Wellcome to easy Online Shop</span></h3>
                        @php
                            $messages = App\Models\Messages::where('type', 'Web')->first();
                        @endphp
                        {{-- {{$messages->message}} --}}{{$messages->message}}
                    </div>{{-- end card --}}
                </div>{{-- end col-md-6 --}}
            </div>{{-- end row --}}
        </div>{{-- end container --}}
    </div>{{-- end body-content --}}

@endsection