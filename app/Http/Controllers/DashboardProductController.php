<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.product.index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'image' => 'required|image|file|max:5000',
            'desc' => 'required'
        ]);

        $date = __(date('H-i-s'));
        $random = Str::random(mt_rand(5,20));
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        
        // methode mas haidar
        // if($request->file('image')) {
        //     $request->file('image')->move('storage/post-images', $date.$random.$request->file('image')->getClientOriginalName());
        //     $product->image = $date.$random.$request->file('image')->getClientOriginalName();
        // }

        // metode pak dika
        if($request->file('image')) {
            $product->image = $request->file('image')->storeAs('post-images', $random . $date . '.jpg');
        }

        $product->desc = $request->desc;

        $product->save();

        return redirect('/dashboard/product')->with('success', 'New product has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('dashboard.product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('dashboard.product.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $date = date('H-i-s');
        $random = Str::random(5);

        $rules = [
            'name' => 'required|max:255',
            'price' => 'required',
            'image' => 'image|file|max:5000',
            'desc' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $request->file('image')->move('storage/post-images', $date.$random.$request->file('image')->getClientOriginalName());
            $validatedData['image'] = $date.$random.$request->file('image')->getClientOriginalName();
        }


        Product::where('id', $product->id)
            ->update($validatedData);

        return redirect('/dashboard/product')->with('success', 'Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }

        Product::destroy($product->id);

        return redirect('/dashboard/product')->with('success', 'Product has been deleted!');
    }

}
