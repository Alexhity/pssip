@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Каталог курсов</h1>

        <!-- Фильтры и поиск -->
        <form class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Поиск..." value="{{ request('search') }}">
            </div>

            <div class="col-md-3">
                <select name="language" class="form-select">
                    <option value="">Все языки</option>
                    @foreach($languages as $lang)
                        <option value="{{ $lang->name }}" {{ request('language') == $lang->name ? 'selected' : '' }}>
                            {{ $lang->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <select name="teacher" class="form-select">
                    <option value="">Все преподаватели</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ request('teacher') == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->full_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary">Фильтровать</button>
            </div>
        </form>

        <!-- Сортировка -->
        <div class="mb-3">
            Сортировать по:
            <a href="{{ request()->fullUrlWithQuery(['sort' => 'title', 'order' => 'asc']) }}"
               class="btn btn-sm {{ $sort == 'title' ? 'btn-primary' : 'btn-outline-secondary' }}">
                Названию
            </a>
            <a href="{{ request()->fullUrlWithQuery(['sort' => 'price', 'order' => 'asc']) }}"
               class="btn btn-sm {{ $sort == 'price' ? 'btn-primary' : 'btn-outline-secondary' }}">
                Цене
            </a>
        </div>

        <!-- Список курсов -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($courses as $course)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                            <p class="text-muted">Преподаватель: {{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</p>
                            <p class="fw-bold">Цена: {{ $course->price }} руб.</p>
                            <form action="{{ route('cart.add', $course) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">В корзину</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Секция корзины -->
        <div class="mt-5">
            <h2>Корзина</h2>
            @if(count($cart) > 0)
                <!-- ... существующая таблица ... -->
                <div class="text-end mt-3">
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg">
                            Оформить заказ ({{ array_sum(array_column($cart, 'price')) }} руб.)
                        </button>
                    </form>
                </div>
            @endif

            @if(count($cart) > 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th>Курс</th>
                        <th>Цена</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td>{{ $item['title'] }}</td>
                            <td>{{ $item['price'] }} руб.</td>
                            <td>
                                <a href="{{ route('cart.remove', $item['id']) }}"
                                   class="btn btn-danger btn-sm">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">Корзина пуста</div>
            @endif
        </div>
{{--        <form action="{{ route('cart.add', $course) }}" method="POST">--}}
{{--            @csrf--}}
{{--            <button type="submit" class="btn btn-success">В корзину</button>--}}
{{--        </form>--}}
        <!-- Пагинация -->
        <div class="mt-4">
            {{ $courses->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
