@extends('layouts.app')

{{-- @section('title', 'Pridėti') --}}
@section('content')
@section('title', 'Pridėti')


<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h5 style="font-size: 18px; font-weight: bold" class="card-title">{{$customer->name}} {{$customer->surname}}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{$customer->account_number}}</p>
                <p style="font-weight: bold"> Likutis: {{$customer->balance}} eur</p>
            </div>
            <form style="padding: 0 16px" action="{{route('customers-updateAdd', $customer)}}" method="post">
                <input type="text" name="balance" class="form-control" placeholder="0.00" value="{{old('balance')}}">

                <button style="margin-bottom: 10px" type="submit" class="btn btn-outline-info mt-4">Pridėti lėšas</button>
                @csrf
                @method('put')
            </form>
        </div>
    </div>
</div>

@endsection
