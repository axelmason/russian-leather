@extends('layouts.app')


@section('header') @endsection

@section('content')
<div class="admin-page-wrapper">
    <div class="admin-form-wrapper">
        <div class="img-wrapper d-flex justify-content-center mb-2">
            <img src="{{ asset('logo.png') }}" style="width: 100px;" alt="">
        </div>
        <h2 class="admin-form-title">Вход в админ-панель</h2>
        <hr>
        <form action="{{ route('admin.login') }}" method="post" class="admin-form">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-danger fs-6">{{ $error }}</div>
                @endforeach
            @endif
            @csrf
            <div class="admin-input-group d-flex flex-column mb-2">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="admin-input-group d-flex flex-column mb-2">
                <label for="password">Пароль</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="admin-input-group d-flex flex-column">
                <button type="submit" class="btn btn-outline-dark w-100">Войти</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer') @endsection
