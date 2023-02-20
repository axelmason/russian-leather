@extends('layouts.app')

@section('content')
    <div class="container pt-3">
        <div class="video-wrapper">
            <video autoplay muted loop id="video">
                <source src="{{ asset('video.mp4') }}" type="video/mp4">
            </video>
        </div>
    </div>
    <div class="container position-relative py-3 text-white">
        @inject('settings', 'App\Models\Settings')
        <h3>О нас</h3>
        <p>{{ $settings->find('about')->value['description'] }}</p>
        <hr>
        <h3>Популярные виды кожи</h3>
        <p>{{ $settings->find('leather_types')->value['description'] }}</p>
        <hr>
        <div class="news-section">
            <h3>Новости</h3>
            <div class="news-items text-dark row">
                <div class="row">
                    @foreach ($settings->find('news')->value['array'] as $news)
                        <div class="col-lg-4 col-12">
                            <div class="card" style="height: 270px; overflow-y: auto;">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $news['title'] }}</h4>
                                    <hr>
                                    <p>{{ $news['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="clients-section my-4">
            <h3>Наши клиенты</h3>
            <div class="clients-items bg-light py-2">
                <div class="d-flex justify-content-evenly align-items-center">
                    @foreach ($settings->find('clients')->value['array'] as $client)
                        <div class="client-img-wrapper" style="width: 100px;">
                            <img src="{{ asset('default_clients/' . $client['image']) }}" title="{{ $client['name'] }}"
                                alt="{{ $client['name'] }}" style="width: 100%">
                        </div>
                        @if (!$loop->last)
                            <div class="vr bg-dark"></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
