<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Показать</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>

    <p>Цена: {{ $product->price }} руб.</p>
    <p>Осталось в наличии: {{ $product->stock }}</p>

        <form action="{{ route('orders.store', $product->id) }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <label for="quantity">Количество:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="{{ $product->stock }}" required>
        <button type="submit">Заказать</button>
    </form>



</body>
</html>