<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    private $products;

    public function __construct(){
        $this->products = [
            [
                    "id" => 1,
                "nome" => "iPhone 13",
                "preco" => 7999.99,
                "categorias" => ["Eletrônicos", "Celulares"],
                "estoque" => 15
            ],
            [
                    "id" => 2,
                "nome" => "Samsung Galaxy S21",
                "preco" => 6999.99,
                "categorias" => ["Eletrônicos", "Celulares"],
                "estoque" => 20
            ],
            [
                    "id" => 3,
                "nome" => "MacBook Pro",
                "preco" => 13999.99,
                "categorias" => ["Eletrônicos", "Computadores"],
                "estoque" => 10
            ],
            [
                    "id" => 4,
                "nome" => "Monitor LG 27''",
                "preco" => 1999.99,
                "categorias" => ["Eletrônicos", "Computadores", "Monitores"],
                "estoque" => 25
            ],
            [
                    "id" => 5,
                "nome" => "Teclado Mecânico Razer",
                "preco" => 499.99,
                "categorias" => ["Periféricos"],
                "estoque" => 50
            ],
            [
                    "id" => 6,
                "nome" => "Fone de Ouvido Sony",
                "preco" => 299.99,
                "categorias" => ["Periféricos"],
                "estoque" => 35
            ],
            [
                "id" => 7,
                "nome" => "Smart TV LG 55''",
                "preco" => 4599.99,
                "categorias" => ["Eletrônicos", "TVs"],
                "estoque" => 8
            ],
            [
                  "id" => 8,
                "nome" => "PlayStation 5",
                "preco" => 4999.99,
                "categorias" => ["Eletrônicos", "Consoles"],
                "estoque" => 12
            ],
            [
                    "id" => 9,
                "nome" => "Cadeira Gamer",
                "preco" => 799.99,
                "categorias" => ["Móveis"],
                "estoque" => 18
            ],
            [
                    "id" => 10,
                "nome" => "Câmera GoPro Hero 10",
                "preco" => 2999.99,
                "categorias" => ["Eletrônicos", "Câmeras"],
                "estoque" => 22
            ]
        ];
    }

    public function getAll(){

        $produtos = collect($this->products);

        $produtos->groupBy("id");

        return $produtos->all();

    }

    public function getById(int $id){

        // $primeiroId = min(array_column($this->products, 'id'));
        // $ultimoId = max(array_column($this->products, 'id'));

        $ultimoId = collect($this->products)->max('id');

        $primeiroId = collect($this->products)->min('id');

        if($id > $ultimoId || $id < $primeiroId){
            return response()->json(['mensagem' => 'ID invalido.'], 404);
        }

        $collection = collect( $this->products)->where("id" , $id);

        return $collection;

    }

    public function getWithLowStock(){

        $collection = collect($this->products);

        return $collection->where("estoque", "<", 20);
    }

    public function getByCategory(string $category = null, string $palavraChave = null){
        $collection = collect($this->products);

        if($category === null && ($palavraChave === null || $palavraChave === "")){
            return response()->json(['mensagem' => 'Forneça uma categoria ou palavra chave.'], 400); //To em duvida se seria o erro 404 ou erro 400.
        }

        $categoria = $collection->filter(function($product) use ($category, $palavraChave){

            if($category !== null){
                $categoriaExiste = in_array($category, $product['categorias']);
            }else{
                $categoriaExiste = true;
            }

            if($palavraChave !== null && $palavraChave !== ''){
                $palavraExiste = strpos($product['nome'], $palavraChave) !== false || in_array($palavraChave, $product['categorias']);
            } else {
                $palavraExiste = true;
            }

            return $categoriaExiste && $palavraExiste;
        });

        return $categoria->all();
    }


    public function getCategories(){
        $collection = collect($this->products);

        $categories = $collection->pluck('categorias')->flatten()->unique();

        return $categories;
    }
}
