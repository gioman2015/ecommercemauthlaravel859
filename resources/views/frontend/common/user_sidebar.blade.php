@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp

<div class="col-md-2"><br> 
    {{-- src="{{ (!empty($user->profile_photo_path))? url($user->profile_photo_path):url('upload/no_image.jpg') }}" --}}
	<img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))? url($user->profile_photo_path):url('upload/no_image.jpg') }}" height="100%" width="100%"><br><br>
    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block" style="background-color: #292929">Home</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block" style="background-color: #292929">Profile Update</a>
        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block" style="background-color: #292929">Change Password </a>
        <a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block" style="background-color: #292929">My Orders</a>
        {{-- <a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block" style="background-color: #292929">Return Orders</a>
        <a href="{{ route('cancel.orders') }}" class="btn btn-primary btn-sm btn-block" style="background-color: #292929">Cancel Orders</a> --}}
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </ul>
</div> <!-- // end col md 2 --> 