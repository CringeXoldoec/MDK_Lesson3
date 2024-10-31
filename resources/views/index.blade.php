<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продукты</title>
</head>
<body>
    <h1>Продукты</h1>

        @foreach ($products as $product)
            <div class="card">
                <h2>{{ $product->name }}</h2>
                <p>Цена: {{ $product->price }} руб.</p>
                <a href="{{ route('products.show', $product->id) }}">Подробнее</a>
            </div>
        @endforeach

</body>
</html>