@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @role('guest')
                {{ json_encode(123) }}
            @endrole
        </div>
    </div>
</div>
@endsection
