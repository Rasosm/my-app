@extends('layouts.app')

@section('content')
</div>
<div class="container">
    <div class="row justify-content-center">

        <div class="col-7" style="margin-top: 0">
            <div class="card m-4">
                <div class="card-header" style="text-align: center; color: #006394; font-weight: bold; letter-spacing: 1px; font-size: 18px; margin-top: 0">
                    Sukurti naują sąskaitą
                </div>
                <div class="card-body">
                    <form action="{{route('customers-store')}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Vardas</label>
                            <input type="text" name="name" class="form-control" placeholder="vardas">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pavardė</label>
                            <input type="text" name="surname" class="form-control" placeholder="pavardė">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Asmens kodas</label>
                            <input type="text" name="personal_id" class="form-control" placeholder="asmens kodas">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sąskaitos numeris</label>
                            <input type="text" name="account_number" class="form-control" placeholder="sąskaitos numeris">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sąskaitos numeris</label>
                            <input type="text" name="balance" class="form-control" placeholder="likutis">
                        </div>

                        <div class="mb-3" style="justify-content: center; display: flex">
                            <button type="submit" class="btn btn-outline-info mt-4">Patvirtinti</button>
                        </div>
                        @csrf

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
