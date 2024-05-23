<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("products.index",compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        /*$products = Product::create($request->all());
        return redirect()->route('products.index')->with('successMsg','El registro se guardó exitosamente');*/

        $image = $request->file('image');
			$slug = Str::slug($request->name);
			if (isset($image))
			{
				$currentDate = Carbon::now()->toDateString();
				$imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

				if (!file_exists('uploads/products'))
				{
					mkdir('uploads/products',0777,true);
				}
				$image->move('uploads/products',$imagename);
			}else{
				$imagename = "";
			}

            $product = new Product();
			$product->name = $request->name;
			$product->description = $request->description;
			$product->price = $request->price;
			$product->stock = $request->stock;
			$product->image = $imagename;
            $product->status = 1;
            $product->registerby = $request->user()->id;
            $product->save();

            return redirect()->route('products.index')->with('successMsg','El registro se guardó exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $products, $id)
    {
        $products = Product::find($id);
        return view('products.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $image = $request->file('image');
			$slug = Str::slug($request->name);
			if (isset($image))
			{
				$currentDate = Carbon::now()->toDateString();
				$imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

				if (!file_exists('uploads/products'))
				{
					mkdir('uploads/products',0777,true);
				}
				$image->move('uploads/products', $imagename);
			}else{
				$imagename = $product->image;
			}
            $product->name = $request->name;
			$product->description = $request->description;
			$product->price = $request->price;
			$product->stock = $request->stock;
			$product->image = $imagename;
            $product->status = 1;
            $product->registerby = $request->user()->id;
            $product->save();

            return redirect()->route('products.index')->with('successMsg','La edicion se guardó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('eliminar','ok');
    }

    public function changestatusproduct(Request $request)
	{
		$product = Product::find($request->product_id);
		$product->status=$request->status;
		$product->save();
	}
}
