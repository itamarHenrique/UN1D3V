@extends('layout.principal')
@section('conteudo')

        @if(empty($products))
        <div class="container">
            <div class="alert alert-danger">
                Você não tem nenhum produto cadastrado.
            </div>
        </div>

        @else

        @if(session('success'))
            <div class="container">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif
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
                <td>{{ $product->descricao ?? 'Nenhuma descrição adicionada' }}</td>
                <td>R${{ number_format($product->preco, 2, ',', '.')}}</td>
                <td><a href="/api/products/show/{{ $product->id }}"><button class="btn btn-light">Visualizar</button></a></td>
                <td>
                    <form action="/api/products/delete/{{ $product->id }}" method="POST">
                        @method('DELETE')
                        <button class="btn btn-danger">Apagar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    @endif

    <div class="d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>


@stop
