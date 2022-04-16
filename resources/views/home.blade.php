@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="pull-right text-end">
                        <a class="btn btn-primary" href="{{ url('clients') }}">Clients</a>
                        <a class="btn btn-primary" href="{{ url('menegers') }}">Menegers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
