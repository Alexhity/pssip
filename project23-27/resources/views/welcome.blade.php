@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Записаться на бесплатный урок</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('free-lesson.store') }}">
            @csrf

            <!-- Имя -->
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <!-- Телефон -->
            <div class="mb-3">
                <label for="phone" class="form-label">Телефон</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>

            <!-- Выбор языка -->
            <div class="mb-3">
                <label for="language_id" class="form-label">Язык</label>
                <select class="form-select" id="language_id" name="language_id" required>
                    <option value="">Выберите язык</option>
                    @foreach($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Отправить заявку</button>
        </form>
        <div style="margin-top: 100px"><h2><a href="{{ route('contact.form') }}" class="nav-link">Обратная связь</a></h2></div>
    </div>
@endsection
