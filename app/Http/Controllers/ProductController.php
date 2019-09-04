<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index($slug)
    {
        $product = Product::where('slug', $slug)->get()->first();
        $supplier = User::where('id', $product->user_id)->get()->first();
        $ratings = Rating::where('product_id', $product->id)->get();

        $rateExist = null;
        if (isset(Auth::user()->id))
            $rateExist = Rating::where('rate_by', Auth::user()->id)->where('product_id', $product->id)->get();

        return view('products.single', ['product' => $product, 'supplier' => $supplier, 'ratings' => $ratings, 'rateExist' => $rateExist]);
    }

    public function showAddProduct()
    {
        return view('products.addproduct', ['category' => new Category]);
    }

    public function store(Request $request)
    {
        $this->productValidator($request)->validate();
        // dd("ss");

        $slug = str_slug($request->title, "-");
        $date = Carbon::now()->toDateString();
        $date = explode("-", $date);
        $date = implode("", $date);
        $time = Carbon::now()->toTimeString();
        $time = explode(":", $time);
        $time = implode("", $time);
        $slug .= "-".$date.$time;
        
        $filename = $request->file('filename')->store('products', 'public');

        $product = new Product;
        $product->user_id = $request->user_id;
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->unit = $request->unit;
        $product->stock = $request->stock;
        $product->filename = $filename;
        $product->slug = $slug;

        if ($product->save()) {
            return redirect('/dashboard');
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if ($product->user_id == Auth::user()->id) {
            return view('products.editproduct', ['category' => new Category, 'product' => $product]);
        } else {
            return redirect('/dashboard');
        }
    }

    public function update($id, Request $request)
    {
        $filename = $request->file('filename')->store('products', 'public');

        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->unit = $request->unit;
        $product->stock = $request->stock;
        $product->filename = $filename;

        if ($product->save()) {
            return redirect('/dashboard');
        }
    }

    public function destroy($id)
    {
        if (Product::find($id)->delete()) {
            return redirect('/dashboard');
        }
    }

    public function showAddCategory()
    {
        $cat = new Category();
        return view('products.addcategory', ['category' => $cat->all()]);
    }

    public function storeCategory(Request $request)
    {
        $cat = new Category();
        $cat->category_name = $request->category_name;
        if ($cat->save()) {
            return redirect(route('category.show'));
        }
    }

    protected function productValidator($request) {
        $messages = [
            'title.required' => 'Judul harus diisi',
            'title.max' => 'Judul maksimal 50 karakter',
            'price.required' => 'Harga harus diisi',
            'price.numeric' => 'Hanya boleh angka',
            'stock.required' => 'Stok harus diisi',
            'stock.numeric' => 'Hanya boleh angka',
            'description.required' => 'Deskripsi harus diisi'
        ];

        // return dd("masuk");

        return Validator::make($request->all(), [
            'title' => ['required', 'max:50'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'description' => ['required']
        ], $messages);
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $products = Product::where('title', 'LIKE', "%$keyword%")->get();
        
        return view('products.search', ['products' => $products]);
    }
}
