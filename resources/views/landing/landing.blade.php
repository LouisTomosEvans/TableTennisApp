
@extends("layouts/navbarandfooter")
@section('content')
<link rel="stylesheet" href="{{ URL::asset('stylesheets/landing.css') }}">

<div class="position-relative overflow-hidden m-3 text-center landingheader">
    <div>
        <img src="{{URL::asset('logo/TTW.png')}}" alt="" width=100%>
    </div>
    <div>
        <br>
        <a class="btn btn-primary rounded-pill d-block d-md-none" href="{{route('login')}}">
            Log In
        </a>
        <br>
        <a class="btn btn-danger rounded-pill d-block d-md-none" href="{{route('register')}}">
            Sign up
        </a>
    </div>
</div>


@endsection