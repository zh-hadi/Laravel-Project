<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index', [
            'orders' => Order::with(['product'])->get()
        ]);

    }

    public function orderCancel(Order $order)
    {
        $order->status = "Cancel";

        $order->save();

        return redirect()->back();
    }

    public function orderDelivered(Order $order)
    {
        $order->status = "Delivered";

        $order->save();

        return redirect()->back();
    }   

    public function orderPdf(Order $order)
    {
        $pdf = Pdf::loadView('pdf.order',[ 'order' => $order]);
        return $pdf->download('order.pdf');
    }
}
