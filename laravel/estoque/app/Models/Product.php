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
        return DB::select('SELECT * FROM products');
    }
}
