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

                    {{ __('You are logged as ') }} {{ auth('api')->user()->name }}
                        <form action="{{ route('deactivate-account') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Deactivate Account</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
