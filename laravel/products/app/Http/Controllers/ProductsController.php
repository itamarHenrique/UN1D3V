<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $product;
    private $request;

    public function __construct(Product $product, Request $request){
        $this->product = $product;
        $this->request = $request;
    }

    public function getAll(){

        return $this->product->getAll();
    }

    public function getById($id){

        return $this->product->getById($id);
    }

    public function getWithLowStock(){
        return $this->product->getWithLowStock();
    }

    public function getByCategory(string $category = null)
{
    $palavraChave = $this->request->query('palavraChave', null);

    return $this->product->getByCategory($category, $palavraChave);
}


    public function getCategories(){
        return $this->product->getCategories();
    }
}
