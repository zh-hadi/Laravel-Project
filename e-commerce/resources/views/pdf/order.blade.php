<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PDF Document</title>
</head>
<body>
    
<div class="bg-blue-100 p-5 text-center mb-3">
        <h2 class="font-bold text-2xl">E-commerce IDAH</h2>
    </div>
    <div class="flex justify-between mb-5 p-5">
        <div class="space-y-2">
            <h2 class="font-bold  uppercase">Customer</h2>
            <div>#name: {{$order->name}}</div>
            <div>#name: {{$order->phone}}</div>
            <div>#address: {{$order->address}}</div>
        </div>
        <div class="space-y-2">
            <h2 class="font-bold  uppercase">Order</h2>
            <div>#order-id: 3001</div>
            <div>#date: 20/10/2024</div>
            <div>#sold by Hadi</div>
        </div>
    </div>
    <hr>
    <div class="p-10">
        <table class="border w-full">
            <thead>
                <tr class="bg-slate-500 text-white p-2 text-center">
                    <th>No</th>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Image</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->product->price }}</td>
                    <td><img class="w-20 h-20" src="storage/{{ $order->product->image }}" /></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>