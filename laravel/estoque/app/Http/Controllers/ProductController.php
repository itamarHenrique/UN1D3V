<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ProductController extends Controller
{

    private $product;
    private $request;

    public function __construct(Product $product, Request $request){
        $this->product = $product;
        $this->request = $request;
    }



    public function index(){

        $products = $this->product->getAll();

        return view('listagem')->with('products', $products);
    }

    public function show($id)
    {

        $products = $this->product->getById($id);

        if(empty($products)){
            return 'Esse produto não existe';
        }


        $product = $products[0];


        return view('detalhes', compact('product'));
    }

    public function store(CreateProductRequest $request)
    {
        $data = $request->only(['nome', 'descricao', 'preco']);

        $this->product->createProduct($data);

        session()->flash('success', 'O produto foi gravado com sucesso');

        return redirect('/api/products');
    }

    public function adiciona()
    {
        return view('formulario');
    }

    public function deleteById($id)
    {
        $deletado = $this->product->deleteByID($id);

        if($deletado){
            return redirect('/api/products')->with('success', 'Produto removido com sucesso.');
        }

        return redirect('/api/products')->with('error', 'Erro ao deletar o produto.');


    }

}
