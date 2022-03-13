<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate();

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }
    
    public function create()
    {
        $product = new Product();
        return view('product.create', compact('product'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->has('image')) {
            $file = $request->file('image');
            $path = "s-folter/".time().$file->getClientOriginalName();
            \Storage::disk("s3")->put($path, file_get_contents($file));
        }else {
            $path = '';
        }
  
        request()->validate(Product::$rules);

        $product = Product::create([
            'title' => $request->title,
            'user_id' => auth()->user()->id,
            'image' => $path,
            'description' => $request->description,
            'price' => $request->price,
            'offer' => $request->offer,
            'inventory' => $request->inventory
        ]);

        return redirect()->route('products.index')
            ->with('success', 'El producto se agrego correctamente.');
            
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        request()->validate(Product::$rules);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Producto eliminado');
    }
}
