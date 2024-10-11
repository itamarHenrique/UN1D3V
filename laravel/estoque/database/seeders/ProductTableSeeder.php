<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert('INSERT INTO products (nome, descricao, preco) VALUES (?,?,?)', array('Geladeira', 'Side by side com gelo na porta', 5870.90));
        DB::insert('INSERT INTO products (nome, descricao, preco) VALUES (?,?,?)', array('Monitor', 'Monitor AOC 4k 144Hz', 1760.00));
        DB::insert('INSERT INTO products (nome, descricao, preco) VALUES (?,?,?)', array('Smart Tv', 'Smart tv LG', 2450.99));
    }
}
