@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-lg-4 col-12">
                    <div class="card">
                        <a href="{{ route('catalog.category', $category->slug) }}" class="card-body">{{ $category->name }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
