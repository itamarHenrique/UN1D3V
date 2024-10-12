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

    public function show(Request $request){
        $id = $request->input('id', '0');

        $products = DB::select('SELECT * FROM products WHERE id = ?', [$id]);


        if(empty($products)){
            return 'Esse produto não existe';
        }


        $product = $products[0];


        return view('detalhes', compact('product'));
    }

}
