@extends("layouts/dashboardnavbar", ['name' => $name])
@section('content')

<div class="container-fluid">
    <div class="row">
        <link rel="stylesheet" href="{{ URL::asset('stylesheets/analytics.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Russo One' rel='stylesheet'>
        @include('widgets/dashboardsidebar')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">   
                    <h1 class="h2 newfont">The Leaderboard</h1>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                        <th>Position</th>
                        <th>Name</th>
                        <th>Rating</th>
                        <th>Games Played</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $pos = 1;
                        foreach($users as $user): ?>
                        <tr>
                        <td><?=$pos?></td>
                        <td><?=$user->name?></td>
                        <td><?=$user->rating?></td>
                        <td><?=$gamecount[$user->id]?></td>
                        </tr>
                    <?php 
                        $pos+=1;
                        endforeach 
                    ?>
                    </tbody>
                    </table>
                </div>
            </main>
    </div>
</div>

@endsection