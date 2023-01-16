@extends ('layouts.app')


@section('title', 'List of Animals')
@section('content')


{{-- <h1>{{$showName}}</h1> --}}
@if($number == 1)
<h1>Racoon</h1>
@elseif($number == 2)
<h1>Beaver</h1>
@else
<h1>Moose</h1>
@endif

<ul>
    @foreach ($colors as $color)
    <li>{{$color}}</li>
    @endforeach
</ul>

<ul class="list-group mt-4">
    @forelse($colors as $color)
    <li class="list-group-item">{{$color}}</li>
    @empty
    <li class="list-group-item">No colors</li>
    @endforelse
</ul>
@endsection
