<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\OrderRequest;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::select('customers.name', 'orders.id', 'orders.dateOrder', 'orders.total', 'orders.status')
        ->join('customers', 'orders.customers_id', '=', 'customers.id')
        ->get();
        return view("orders.index",compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$orders = Order::where('status', '=', '1')->orderBy('name')->get();
        //return view('orders.create');
        $customers = Customer::where('status', '=', '1')->get();
        $products = Product::where('status', '=', '1')->orderBy('name')->get();
        return view('orders.create', compact("customers", "products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$order -> total = $request->total;
        $order -> customers_id = $request->customers_id;
        $order -> route = $request->route;
        $order -> status = 1;
        $order -> registerby = $request->user()->id;
        $order -> save();

        $idorder = $order->id;
        $cont = 0;
        while($cont < count($item)){
            $order_detail = new Order_detail();
            $$order_detail-> order_id = $idorder;
        }*/

        /*$order = Order::create([
            'dateOrder' => Carbon::now()->toDateTimeString(),
            'total' => Product::find($request->product)->price,
            'route' => "Por hacer",
            'customers_id' => Customer::find($request->customer)->id,
            'status' => 1,
            'registerby'=> $request->user()->id,
        ]);
        
        $order->save();

        return redirect()->route("orders.index")->with("successMsg", "La orden fue creada.");*/

        $order = Order::create([
            'dateOrder' => Carbon::now()->toDateTimeString(),
            'total' => 0,
            'route' => "Por hacer",
            'customers_id' => Customer::find($request->customer)->id,
            'status' => 1,
        ]);

        $order->status = 1;
        $order->registerby = $request->registerby;
        $total = 0;

        $rawProductId = $request->product_id;
        $rawQuantity = $request->quantity;
        for ($i = 0; $i < count($rawProductId); $i++) {
            $product = Product::find($rawProductId[$i]);
            $quantity = $rawQuantity[$i];
            $subtotal = $product->price * $quantity;

            $order->order_details()->create([
                'quantity' => $quantity,
                'subtotal' => $subtotal,
                'products_id' => $product->id,
                'order_id' => $order->id,
            ]);

            $total += $subtotal;
        }

        $order->total = $total;
        $order->save();

        return redirect()->route("orders.index")->with("successMsg", "La orden fue creada.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        $customer = Customer::where("id", $order->customers_id)->first();
        $details = Order_detail::with('products')
            ->where('order_details.order_id', '=', $id)
            ->get();

        return view("orders.show", compact("order", 'customer', "details"));

        /*$order = Order::select('customers.name', 'orders.id', 'orders.dateOrder', 'orders.total')
        ->join('customers', 'orders.customers_id', '=', 'customers.id')
        ->where('orders.id', '=', $id)
        ->first();
        $details = Order_detail::with('products')
            ->where('order_details.order_id', '=', $id)
            ->get();

        return view("orders.show", compact("order", "details"));*/
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route("orders.index")->with("successMsg", "La orden fue eliminada");
    }

    public function changestatusorder(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status=$request->status;
        $order->save();
    }
}
