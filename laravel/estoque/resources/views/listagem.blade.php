@extends('principal')
@section('conteudo')

        @if(empty($products))
        <div class="container">
            <div class="alert alert-danger">
                Você não tem nenhum produto cadastrado.
            </div>
        </div>

        @else
        <h1>Listagem de produtos</h1>
        <table class='table table-hover table-bordered'>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ação</th>
        </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->nome }}</td>
                <td>{{ $product->descricao }}</td>
                <td>R${{ $product->preco }}</td>
                <td><a href="/api/products/show/{{ $product->id }}"><button class="btn btn-light">Visualizar</button></a></td>
            </tr>
            @endforeach
        </table>
    @endif
@stop
