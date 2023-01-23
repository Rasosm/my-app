@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @if($errors)
        @foreach ($errors->all() as $message)
        <div class="col-6">
            <div class="alert alert-danger m-4" role="alert">
                {{ $message }}
            </div>
        </div>
        @endforeach
        @endif

        <div class="card">
            <div class="card-header">
                <h5 style="font-size: 18px; font-weight: bold" class="card-title">{{$customer->name}} {{$customer->surname}}</h5>

            </div>
            <div class="card-body">
                <p class="card-text">{{$customer->account_number}}</p>
                <p style="font-weight: bold"> Likutis: {{$customer->balance}} eur</p>

            </div>

            <form style="padding: 0 16px" action="{{route('customers-updateTransfer', $customer)}}" method="post">

                <input type="text" name="balance" class="form-control" placeholder="0.00">
                <button style="margin-bottom: 10px" type="submit" class="btn btn-outline-info mt-4">Nuskaičiuoti lėšas</button>
                @csrf
                @method('put')

            </form>
        </div>



    </div>
</div>

@endsection
