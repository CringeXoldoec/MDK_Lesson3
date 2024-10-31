<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('show', compact('product'));
    }

    public function store(Request $request)
    {
        // Проверяем наличие продукта
        $product = Product::findOrFail($request->input('product_id'));
    
        // Валидируем количество с учетом доступной стока продукта
        Validator::make($request->all(), [
            'quantity' => 'required|numeric|min:1|max:' . $product->stock,
        ])->validate();
    
        // Создаем новый заказ
        $order = new Order();
        $order->product_id = $request->input('product_id');
        $order->quantity = $request->input('quantity');
    
        // Вычисляем общую сумму цены 
        $totalPrice = $product->price * $request->input('quantity');
        $order->total_price = $totalPrice;
    
        // Сохраняем заказ
        $order->save();
    
        return redirect()->route('products.show', $request->input('product_id'))->with('success', 'Заказ успешно создан!');
    }
    
    
    
    
}
