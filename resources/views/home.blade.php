@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        You are logged in!

                        <div>
                            @if (empty(Auth::user()->one_signal_player_id))
                                Trzeba uzupełnić one signal player id w bazie
                            @else
                                {!! Form::open(['route' => 'home.simpleNotif']) !!}
                                {{ Form::submit('Wyślij mi notyfikacje', array('class' => 'btn btn-primary')) }}
                                {{ Form::close() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
