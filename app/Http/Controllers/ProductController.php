<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\save;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    // public function index()
    // {
    //     $products = Product::paginate();

    //     return view('product.index', compact('products'))
    //         ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    // }

    public function index() 
    {
        $products= DB::table('products')->where('user_id', Auth::user())->get();

        return view('product.index', compact('products'));
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

        // $product = Product::create([
        //     'title' => $request->input('title'),
        //     'user_id' => $request->input('user_id') ?? Auth::id(),
        //     'image' => $path,
        //     'description' => $request->input('description'),
        //     'price' => $request->input('price'),
        //     'offer' => $request->input('offer'),
        //     'inventory' => $request->input('inventory'),
        // ]);

        $product = new Product;
        $product->title = $request->input('title');
        $product->user_id = $request->input('user_id') ?? Auth::id();
        $product->image = $path;
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->offer = $request->input('offer');
        $product->inventory = $request->input('inventory');
        $product->save();

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
