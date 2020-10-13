<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
        </title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Bebas+Neue' rel='stylesheet' type='text/css'>
        
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
        }

            :root {
                --button-color: white;
                --button-background-color: #32b6ff;
            }

            .btn-primary {
            color: var(--button-color);
            background-color: var(--button-background-color);
            border-radius: var(--border-radius);
            }

            .btn-primary:hover {
            box-shadow: inset 0 0 0 20rem var(--darken-1);
            }

            .btn-primary:active {
            box-shadow: inset 0 0 0 20rem var(--darken-2),
                inset 0 3px 4px 0 var(--darken-3),
                0 0 1px var(--darken-2);
            }

            .btn-primary:disabled,
            .btn-primary.is-disabled {
            opacity: .5;
            }

            .btn-outline,
            .btn-outline:hover {
            border-color: currentcolor;
            }

            .btn-outline {
            border-radius: var(--border-radius);
            }

            .btn-outline-primary {
            color: var(--button-background-color);
            background-color: white;
            border-radius: var(--border-radius);
            }

            .btn-outline:hover {
            box-shadow: inset 0 0 0 20rem var(--darken-1);
            }

            .btn-outline:active {
            box-shadow: inset 0 0 0 20rem var(--darken-2),
                inset 0 3px 4px 0 var(--darken-3),
                0 0 1px var(--darken-2);
            }

            .btn-outline:disabled,
            .btn-outline.is-disabled {
            opacity: .5;
            }

        </style>
        <!-- Custom styles for this template -->
        <link href="/discoverable/stylesheets/pricing.css" rel="stylesheet">
    </head>
    <body>
        <div class="d-none d-md-block">
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom shadow-sm d-none d-md-show">
                <h5 class="my-0 mr-md-auto font-weight-normal ml-2 d-none d-md-block">
                    Table Tennis Wars
                </h5>

                <a class="btn btn-primary rounded-pill d-none d-md-block" href="{{route('login')}}">
                    Log In
                </a>

                <span style=padding:5px></span>

                <a class="btn btn-danger rounded-pill d-none d-md-block" href="{{route('register')}}">
                    Sign up
                </a>
            </div>
        </div>

        @section('content')
            You Should not be able to see this
        @show

        
    </body>

</html>