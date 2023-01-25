@extends('layouts.app')

@section('content')
@section('title', 'Sąrašas')


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

        @forelse($customers as $customer)
        <div class="card" style="margin-bottom: 5px">
            <div class="card-header" style="display: inherit">
                <p class="card-title" style="font-size: 18px; font-weight: bold; line-height: 1.4">{{$customer->name}} {{$customer->surname}}</p>
                <p class="card-title" style="margin-left: 7px;">a.k. {{$customer->personal_id}}</p>
            </div>
            <div class="card-body">
                <p class="card-text">{{$customer->account_number}}</p>
                <p style="font-weight: bold"> Likutis: {{$customer->balance}} eur</p>
                <div>
                    <form action="{{route('customers-delete', $customer)}}" method="post">
                        <button style="float: right; color: red;" type="submit" class="btn btn-outline-info mt-4">Ištrinti</button>
                        @csrf
                        @method('delete')
                    </form>

                    <button style="margin-right: 5px;" type="submit" class="btn btn-outline-info mt-4"><a style=" margin-right: 5px; text-decoration: none" href="{{route('customers-add', $customer)}}">Pridėti lėšas</a></button>





                    <button type="submit" class="btn btn-outline-info mt-4"><a style="text-decoration: none" href="{{route('customers-transfer', $customer)}}">Nuskaičiuoti lėšas</a></button>

                    <button style="float: right; margin-right: 7px;" type="submit" class="btn btn-outline-info mt-4"><a style="text-decoration: none" href="{{route('customers-edit', $customer)}}">Redaguoti</a></button>



                </div>
            </div>
        </div>

        @empty
        <div class="list-group-item">No types yet</div>
        @endforelse

    </div>
</div>
</div>

@endsection
