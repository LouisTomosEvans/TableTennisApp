@extends("layouts/dashboardnavbar")
@section('content')

<div class="container-fluid">
    <div class="row">

        @include('widgets/dashboardsidebar')

            <div class="d-none d-md-block col-10 offset-2 color-mainblue">
                <img src="{{ URL::asset('logo/Home.png')}}" width=100% class="center">
            </div>
            <div class="d-md-none color-mainblue">
                <img src="{{ URL::asset('logo/Home.png')}}" class="center-mobile">
            </div>
    </div>
</div>

@endsection