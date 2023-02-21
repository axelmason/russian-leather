@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if ($products->previousPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="#{{ $products->previousPageUrl() }} aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                @endif
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                @if ($products->nextPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <div class="row row-cols-1 row-cols-lg-3 g-5">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card border-success mb-3">
                        <a href="#"><img src="{{ asset('storage/products/' . $product->image) }}"
                                class="card-img-top"></a>
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-dark">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text"></p>
                            </a>
                            <div class="row mt-3">
                                <p class="d-flex justify-content-center col mt-2">{{ $product->price }} ₽</p>
                                <a href="#" class="btn btn-success col me-4" style="width: 120px; height: 38px;">В
                                    корзину</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
