<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            Dashboard
        </title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">


        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    
        <style>
            .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }
    
            @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }

            .color-mainblue{
                background-color: #32b6ff;
            }
            
        }
        </style>
        <!-- Custom styles for this template -->
        
        
        <link href="/stylesheets/pricing.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('stylesheets/analytics.css') }}">
    </head>

    <body>
        <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow-sm color-mainblue">
            <a class="navbar-brand backgroud col-md-3 col-lg-2 mr-5px px-3 color-mainblue" href="">
                <img src="{{URL::asset('logo/TTW_WHITE.png')}}" alt="" width='50px'>
            </a>
            <button id="sidebar-toggler" class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav px-3 d-none d-md-block">
                <li class="nav-item text-nowrap">
                    <a class="nav-link text-white">
                        <?= 'Hello, ' . $name;?>
                    </a>
                </li>
            </ul>
        </nav>


        @section('content')
            You Should not be able to see this
        @show

    </body>
</html>