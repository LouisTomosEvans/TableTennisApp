@extends('layouts/dashboardnavbar')

@section('content')

<div class="container-fluid">
    <div class="row">
        <link rel="stylesheet" href="{{ URL::asset('stylesheets/analytics.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Russo One' rel='stylesheet'>
        @include('widgets/dashboardsidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 newfont">
                    Record a new match
                </h1>
            </div>
            <div id="create">
                <form method="POST" action="{{route('match.store')}}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">
                                Player one:
                            </label>
                            <select name="playerone" class="form-control" v-model="personone" >
                            @foreach($users as $user)
                                <option value="{{ $user->id }}"> {{ $user->name }} </option>
                            @endforeach 
                            </select>
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">
                                Player Two:
                            </label>
                            <select name="playertwo" class="form-control" v-model="persontwo">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}"> {{ $user->name }} </option>
                            @endforeach 
                            </select>
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">
                                Player one score:
                            </label>
                            <br>
                            <input type="number" id="quantity" name="scoreone" min="0" max="11" v-model="scoreone">
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">
                                Player two score:
                            </label>
                            <br>
                            <input type="number" id="quantity" name="scoretwo" min="0" max="11" v-model="scoretwo">
                        </div> 
                    </div>
                    <br>
                    <button  v-bind:disabled='valid' class="btn btn-md btn-primary rounded-pill btn-block col-md-6" type="submit">
                            Save match +
                    </button>
                </form>
            </div>
        </main>
    </div>
</div>

<script>
        var app = new Vue({
            el: "#create", 
            data: function (){
                return {
                    personone: "",
                    persontwo: "",
                    scoreone: "",
                    scoretwo: ""
                }
            },

            computed:{
                valid: function(){
                    if ((this.personone==this.persontwo) || (this.scoreone==this.scoretwo)){
                            return true;
                    }
                }
            }
        
        });


    </script>


@endsection