@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 login-alert">
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Pranešimas') }}</div>



                <div class="card-body alert">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Sveikinu prisijungus!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
