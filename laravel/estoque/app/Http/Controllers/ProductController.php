<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{

    private $product;

    public function __construct(Product $product){
        $this->product = $product;
    }



    public function index(){

        $products = DB::select('SELECT * FROM products');

        return view('listagem')->with('products', $products);
    }
}
