@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="first_name">Имя</label>
                            <input id="first_name" type="text" class="form-control" name="first_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="last_name">Фамилия</label>
                            <input id="last_name" type="text" class="form-control" name="last_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone">Телефон</label>
                            <input id="phone" type="text" class="form-control" name="phone">
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password">Пароль</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm">Подтвердите пароль</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
