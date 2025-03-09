@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Свяжитесь с нами</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Ваш email:</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    placeholder="example@domain.com"
                    required
                >
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
