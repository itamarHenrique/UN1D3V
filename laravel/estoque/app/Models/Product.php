<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'preco'];

    protected $product = 'products';

    public function getById($id){

        return DB::select('SELECT * FROM products WHERE id = ?', [$id]);
    }

    public function getAll(){
        return DB::table('products')->paginate(10);
    }

    public function createProduct($data){
        return DB::table('products')->insert([
            'nome' => $data['nome'],
            'descricao' => $data['descricao'],
            'preco' => $data['preco'],
            'created_at' => now('UTC'),
            'updated_at' => now('UTC')
        ]);
    }
}
